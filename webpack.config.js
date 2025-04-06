const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = [
	{
		entry: {
			main: ["./js/src/main.js", "./css/src/main.scss"],
		},
		output: {
			filename: "./js/build/[name].min.[fullhash].js",
			path: path.resolve(__dirname),
		},
		devServer: {
			static: path.resolve(__dirname),
			port: 8080,
			hot: true,
			watchFiles: {
				paths: [
					"./template-*.php",
					"./template-parts/**/*.php",
					"./template-parts/componentes/**/*.php", // Específicamente componentes
					"./template-parts/secciones/**/*.php", // Específicamente secciones
					"./template-parts/layout/**/*.php", // Específicamente layout
					"./css/src/**/*.scss",
					"./js/src/**/*.js",
					"./*.php",
					"./**/*.php",
				],
				options: {
					usePolling: false,
					ignored: ["**/node_modules/**", "**/vendor/**", "**/.*/"],
				},
			},
			devMiddleware: {
				writeToDisk: true,
			},
		},
		resolve: {
			alias: {
				"~": path.resolve(__dirname, "node_modules"),
			},
		},
		module: {
			rules: [
				{
					test: /\.(js|jsx)$/,
					exclude: /node_modules/,
					loader: "babel-loader",
				},
				{
					test: /\.(sass|scss)$/,
					use: [
						MiniCssExtractPlugin.loader,
						{
							loader: "css-loader",
							options: {
								importLoaders: 2,
							},
						},
						{
							loader: "postcss-loader",
							options: {
								postcssOptions: {
									plugins: [require("autoprefixer")],
								},
							},
						},
						{
							loader: "sass-loader",
							options: {
								sassOptions: {
									includePaths: [path.resolve(__dirname, "node_modules")],
								},
							},
						},
					],
				},
				{
					test: /\.css$/,
					use: [MiniCssExtractPlugin.loader, "css-loader"],
				},
				// Resto de tus loaders...
			],
		},
		plugins: [
			new CleanWebpackPlugin({
				cleanOnceBeforeBuildPatterns: ["./js/build/*", "./css/build/*"],
			}),
			new MiniCssExtractPlugin({
				filename: "./css/build/main.min.[fullhash].css",
			}),
			new BrowserSyncPlugin({
				proxy: "http://entrezingenieros.local/", // Ajusta esto a tu URL local de WordPress
				port: 3000,
				files: ["./**/*.php", "./css/src/**/*.scss", "./js/src/**/*.js"],
				injectChanges: true,
				notify: false,
			}),
		],
		optimization: {
			minimizer: [`...`, new CssMinimizerPlugin()],
		},
	},
];
