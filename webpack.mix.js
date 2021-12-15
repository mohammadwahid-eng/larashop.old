const crypto = require("crypto");
const crypto_orig_createHash = crypto.createHash;
crypto.createHash = algorithm => crypto_orig_createHash(algorithm == "md4" ? "sha256" : algorithm);


let theme = process.env.npm_config_theme;

if(theme) {
    require(`${__dirname}/resources/themes/${theme}/webpack.mix.js`);
} else {
    require(`${__dirname}/resources/themes/default/webpack.mix.js`);
}

