cd $(dirname $0)

set -e

if [[ ! -d backend/ ]]
then
    # clone to backend/
    git clone --single-branch --branch php $(git config remote.origin.url) backend/
else
    # clean backend/ of built files
    find backend/ -type f \
        \( -name "*.html" -o -name "*.js" -o -name "*.css" -o -name "*.pdf" -o -name "*.map" \
           -o -name "*.png" -o -name "*.svg" -o -name "*.jpg" -o -name "*.ico" \) \
        -delete
    rm -rf backend/css backend/images backend/img backend/js backend/uploads
fi

yarn install && yarn build
cp -r dist/ backend/

echo "The backend is prepared at $(pwd)/backend/"
