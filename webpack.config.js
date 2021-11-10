const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require("terser-webpack-plugin");
const isDevelopment = process.env.NODE_ENV !== 'production';

module.exports = {
    mode: isDevelopment ? 'development' : 'production',
    target: isDevelopment ? 'web' : 'browserslist',
    devServer: {
        port: 8000,
        hot: true
    },
    entry: {
        app: path.join(__dirname, 'src', 'index.tsx')
    },
    module: {
        rules: [
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: "asset/resource"
            },
            {
                test: /\.[jt]sx?$/,
                exclude: /node_modules/,
                use: [{loader: 'ts-loader'},],
            },
            {
                test: /\.s?css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {publicPath: ""},
                    },
                    'css-loader',
                    'postcss-loader',
                    'sass-loader'
                ]
            }
        ],
    },
    output: {
        filename: 'js/[name].js',
        path: path.resolve(__dirname, 'assets'),
        clean: true,
        assetModuleFilename: "images/[hash][ext][query]",
    },
    plugins: [
        isDevelopment && new HtmlWebpackPlugin({
            template: path.join(__dirname, 'src', 'index.html')
        }),
        new MiniCssExtractPlugin({
            filename: "css/[name].css"
        }),
    ].filter(Boolean),
    resolve: {
        extensions: ['.js', '.ts', '.tsx'],
        modules: ['.', 'node_modules']
    },
    devtool: "source-map",
    optimization: {
        minimize: true,
        minimizer: [new TerserPlugin({
            terserOptions: {
                format: {
                    comments: false,
                },
            },
            extractComments: false,
        })],
    },
};
