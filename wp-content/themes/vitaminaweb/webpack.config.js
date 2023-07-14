const path = require('path');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const isDevelopment = process.env.NODE_ENV !== 'production';
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    devtool: isDevelopment ? 'source-map' : 'eval',
    entry: {
        'main': [
            path.resolve(__dirname, 'resources/scripts', 'index.js'),
            path.resolve(__dirname, 'resources/styles', 'index.scss')
        ]
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'scripts/[name].bundle.js',
        clean: true,
    },
    resolve: {
        extensions: ['.js', '.jsx', '.scss']
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/plugin-transform-runtime'],
                    }
                }
            },
            {
                test: /\.(s(a|c)ss)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader']
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'resources/fonts/[name][ext]',
                }
            },
            {
                test: /\.(png|jpg|gif)$/,
                type: 'asset/resource',
                generator: {
                    filename: 'resources/images/[name][ext]',
                }
            },
            {
                test: /\.svg/,
                type: 'asset/resource',
                generator: {
                    filename: 'resources/images/svg/[name][ext]',
                }
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'styles/[name].bundle.css',
        }),
        new webpack.LoaderOptionsPlugin({
            options: {
                postcss: [
                    autoprefixer(),
                ],
            },
        }),
    ],
    devServer: {
        devMiddleware: {
          writeToDisk: true
        }
    },
    performance: {
        hints: false,
        maxEntrypointSize: 512000,
        maxAssetSize: 512000
    }
};