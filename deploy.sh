cd $(dirname $0)

set -e

if [[ ! -d backend/ ]]
then
    # clone to backend/
    echo "No backend/ directory detected. Cloning backend branch from origin..."
    git clone --single-branch --branch php $(git config remote.origin.url) backend/
fi

echo "Building frontend..."
yarn install && yarn build

# clean backend/ of built files
echo "Cleaning backend built files..."
find backend/ -type f \
    \( -name "*.html" -o -name "*.js" -o -name "*.css" -o -name "*.pdf" -o -name "*.map" \
       -o -name "*.png" -o -name "*.svg" -o -name "*.jpg" -o -name "*.ico" \) \
    -delete
rm -rf backend/css backend/images backend/img backend/js backend/uploads

echo "Moving built files to backend/..."
cp -r dist/ backend/

echo "The backend is prepared at $(pwd)/backend/"
