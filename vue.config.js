module.exports = {
  chainWebpack: config => {
    config.module.rule('pdf').test(/\.pdf$/i).use('file-loader').loader('file-loader')
    config.plugin('html').tap(args => {
      args[0].title = 'YKPS Portal'
      return args
    })
  }
}
