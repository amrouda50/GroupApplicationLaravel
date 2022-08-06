module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        "plugin:vue/essential",
    ],
    "parserOptions": {
        "ecmaVersion": 2021,
        "sourceType": "module"
    },
    "plugins": [
        "vue"
    ],
    "rules": {
        'comma-dangle': 'off',
        semi: [2, 'never'],
        'vue/no-mutating-props': 'off',
    },
    ignorePatterns: ['vendor/**/*.js']
}
