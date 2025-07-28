const fs = require('fs');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

// Function to get all Gutenberg blocks including nested ones
const getGutenbergBlocks = (basePath) => {
    const blocks = [];
    
    const scanDirectory = (dirPath, relativePath = '') => {
        const items = fs.readdirSync(dirPath);
        
        items.forEach(item => {
            const fullPath = path.join(dirPath, item);
            const stat = fs.statSync(fullPath);
            
            if (stat.isDirectory()) {
                // Check if this directory contains a block.json file
                const blockJsonPath = path.join(fullPath, 'block.json');
                if (fs.existsSync(blockJsonPath)) {
                    const blockName = relativePath ? `${relativePath}/${item}` : item;
                    blocks.push({
                        name: blockName,
                        path: fullPath,
                        entry: path.join(fullPath, 'index.js')
                    });
                } else {
                    // Recursively scan subdirectories
                    const newRelativePath = relativePath ? `${relativePath}/${item}` : item;
                    scanDirectory(fullPath, newRelativePath);
                }
            }
        });
    };
    
    scanDirectory(basePath);
    return blocks;
};

// Get all Gutenberg blocks
const gutenbergBlocks = getGutenbergBlocks(path.resolve(__dirname, 'src/gutenberg'));

// Create entry points for all blocks
const entry = {};
gutenbergBlocks.forEach(block => {
    entry[block.name] = block.entry;
});

module.exports = (env, argv) => {
    const isProduction = argv.mode === 'production';

    return {
        entry,
        output: {
            path: path.resolve(__dirname, 'build/gutenberg'),
            filename: '[name]/index.js',
            clean: true
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: '[name]/index.css'
            })
        ],
        module: {
            rules: [
                {
                    test: /\.(js|jsx)$/,
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env', '@babel/preset-react']
                        }
                    }
                },
                {
                    test: /\.scss$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        'sass-loader'
                    ]
                },
                {
                    test: /\.(png|jpe?g|gif|svg)$/i,
                    type: 'asset/resource'
                }
            ]
        },
        resolve: {
            extensions: ['.js', '.jsx', '.json'],
            alias: {
                '@gutenberg': path.resolve(__dirname, 'src/gutenberg'),
            }
        },
        optimization: {
            minimize: isProduction,
            minimizer: [
                new TerserPlugin(),
                new CssMinimizerPlugin(),
            ],
            splitChunks: {
                cacheGroups: {
                    defaultVendors: {
                        test: /[\\/]node_modules[\\/]/,
                        name: 'dependencies/vendors',
                        chunks: 'all',
                        enforce: true,
                    },
                    common: {
                        name: 'dependencies/common',
                        minChunks: 2,
                        chunks: 'all',
                        priority: -20,
                        reuseExistingChunk: true,
                        enforce: true,
                    },
                },
            },
        },
        devtool: isProduction ? false : 'source-map',
        watchOptions: {
            ignored: /node_modules/,
            aggregateTimeout: 300,
            poll: 1000,
        },
    }
}; 