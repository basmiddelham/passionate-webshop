/**
 * This is a main entrypoint for Webpack config.
 *
 * @since 1.0.0
 */
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const ESLintPlugin = require("eslint-webpack-plugin");
const StylelintPlugin = require("stylelint-webpack-plugin");
const WebpackBar = require("webpackbar");

const projectPaths = {
  jsPath: path.resolve(__dirname, "assets/src/js"),
  imagesPath: path.resolve(__dirname, "assets/src/images"),
  outputPath: path.resolve(__dirname, "assets/dist"),
};

const projectJsFiles = {
  frontend: projectPaths.jsPath + "/frontend.js",
  backend: projectPaths.jsPath + "/backend.js",
  tinymce: projectPaths.jsPath + "/tinymce.js",
  mapbox: projectPaths.jsPath + "/components/mapbox.js",
  swiper: projectPaths.jsPath + "/components/swiper.js",
  fancybox: projectPaths.jsPath + "/components/fancybox.js",
};

module.exports = (env) => {
  process.env.NODE_ENV = env.NODE_ENV;

  const plugins = [
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
    }),
    new CopyPlugin({
      patterns: [
        {
          from: projectPaths.imagesPath,
          to: "images",
          noErrorOnMissing: true,
        },
      ],
    }),
    new WebpackBar(),
  ];

  if (env.NODE_ENV === "development") {
    plugins.push(
      new BrowserSyncPlugin({
        host: "localhost",
        port: 3000,
        proxy: "https://webshop-passionate.local/",
        files: "**/**/**.php",
      })
    );
    plugins.push(new ESLintPlugin());
    plugins.push(new StylelintPlugin());
  }

  return {
    mode: env.NODE_ENV,
    entry: projectJsFiles,
    output: {
      path: projectPaths.outputPath,
      filename: "js/[name].js",
      clean: true,
    },
    devtool: env.NODE_ENV === "production" ? false : "cheap-module-source-map",
    module: {
      rules: [
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            "css-loader",
            {
              loader: "postcss-loader",
              options: {
                postcssOptions: {
                  plugins: [["autoprefixer"]],
                },
              },
            },
            "sass-loader",
          ],
        },
        {
          test: /\.(png|svg|jpg|jpeg|gif)$/i,
          type: "asset/resource",
          generator: {
            filename: "images/[name][ext]",
          },
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/i,
          type: "asset/resource",
          generator: {
            filename: "fonts/[name][ext]",
          },
        },
      ],
    },
    plugins,
    externals: {
      jquery: "jQuery",
    },
  };
};
