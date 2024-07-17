const fs = require('fs');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

// Function to get features for a given environment
const getFeatures = (env) => {
    const envPath = path.resolve(__dirname, 'src', env);
    return fs.readdirSync(envPath).filter(file =>
        fs.statSync(path.join(envPath, file)).isDirectory()
    );
};

// Get features for admin and frontend
const adminFeatures = getFeatures('admin');
const frontendFeatures = getFeatures('frontend');

// Dynamically create entry points
const entry = {};
adminFeatures.forEach(feature => {
    entry[`admin/${feature}`] = `./src/admin/${feature}/index.js`;
});
frontendFeatures.forEach(feature => {
    entry[`frontend/${feature}`] = `./src/frontend/${feature}/index.js`;
});

module.exports = {
    mode: 'production', // development / production
    entry,
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: '[name]/index.js'
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
            }
        ]
    },
    resolve: {
        extensions: ['.js', '.jsx', '.json'],
        alias: {
            '@admin': path.resolve(__dirname, 'src/admin'),
            '@frontend': path.resolve(__dirname, 'src/frontend')
        }
    },
    devtool: 'eval-cheap-module-source-map',
    devServer: {
        static: {
            directory: path.join(__dirname, 'build'),
        },
        hot: true,
        compress: true,
        port: 9000, // You can change this to any port you prefer
    }
};