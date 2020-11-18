# portal-redesign

## Project Layout

This `vuejs` branch contains the Vue.js frontend. The `php` branch contains built files from this branch, as well as PHP code.

To copy build webpages to backend, you can do
```sh
sh deploy.sh
```
which automatically sets up and builds the Vue.js frontend and creates a separate backend git branch at `./backend/` and dumps the built files there.
Once you do that, you can add and commit the backend.

For an actual deployment of the backend, refer to the [Backend README](https://github.com/YKPS-FooBar/portal-redesign/blob/php/README.md).

## Project setup
```sh
yarn install
```

### Compiles and hot-reloads for development
```sh
yarn serve
```

### Compiles and minifies for production
```sh
yarn build
```

### Lints and fixes files
```sh
yarn lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
