cd "$(dirname "$0")"

sh clean.sh

set -e
git checkout vuejs-bootstrap-vue
yarn install
yarn build
git checkout php
cp -r dist/ ./
