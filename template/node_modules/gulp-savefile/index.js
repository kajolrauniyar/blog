'use strict';
var gutil = require('gulp-util');
var through = require('through2');
var fs = require('fs');

// 说明:
//   不使用 gulp.dest 存盘因为
//   1. gulp.dest 获取的文件路径依赖 file.relative
//   2. gulp.watch 时 gulp.src(event.path) 获取的 file.relative 仅有文件名
//   3. gulp.src 通过通配符匹配的文件，获取的 file.relative 是相对 gulp 启动目录的
//   4. 我只希望使用当前文件路径保存
module.exports = function (opts) {
  return through.obj(function (file, enc, cb) {
    if (file.isNull()) {
      this.push(file);
      return cb();
    }

    if (file.isStream()) {
      this.emit('error', new gutil.PluginError('gulp-tpl.save', 'Streaming not supported'));
      return cb();
    }

    try {
      fs.writeFileSync(file.path, file.contents || '');
    } catch (err) {
      this.emit('error', new gutil.PluginError('gulp-tpl.save', err));
    }

    this.push(file);
    return cb();
  });
}
