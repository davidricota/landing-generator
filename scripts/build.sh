#!/bin/bash

set -e

PLUGIN_SLUG="landing-generator"
BUILD_DIR="dist/$PLUGIN_SLUG"

echo "🧹 Limpiando carpeta de destino..."
rm -rf dist
mkdir -p "$BUILD_DIR"

echo "📦 Copiando archivos del plugin..."
rsync -av --exclude='vendor' --exclude='dist' --exclude='.git' --exclude='scripts' . "$BUILD_DIR"

echo "📦 Instalando dependencias en el build..."
composer install --no-dev --optimize-autoloader --working-dir="$BUILD_DIR"

echo "🗜️  Generando ZIP..."
cd dist
zip -r "${PLUGIN_SLUG}.zip" "$PLUGIN_SLUG"

echo "✅ Build finalizado: dist/${PLUGIN_SLUG}.zip"
