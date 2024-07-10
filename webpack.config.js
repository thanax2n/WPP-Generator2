const fs = require('fs');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { VueLoaderPlugin } = require('vue-loader')

// Dynamic feature detection
const srcPath = path.resolve(__dirname, 'src');
const features = fs.readdirSync(srcPath).filter(file =>
    fs.statSync(path.join(srcPath, file)).isDirectory()
);

// Dynamically create entry points
const entry = {};
features.forEach(feature => {
    entry[feature] = `./src/${feature}/index.js`;
});

// Webpack configuration
module.exports = {
    mode: 'development',
    entry,
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: '[name]/index.js'
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name]/index.css'
        }),
        new VueLoaderPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.css$/,
                use: [
                    'vue-style-loader',
                    'css-loader'
                ]
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: 'babel-loader'
            }
        ]
    },
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            ...features.reduce((acc, feature) => {
                acc[`@${feature}`] = path.resolve(__dirname, `src/${feature}`);
                return acc;
            }, {}),
            'vue': '@vue/runtime-dom'
        }
    },
    devtool: 'eval-cheap-module-source-map',
    devServer: {
        static: './dist',
        hot: true
    }
};