;(function(global) {

  var ClassCycler = function(opt) {

    var timer,
    execCycle = (function() {
      var $item = opt.$targetElm,
      index = 0,
      max = $item.length;

      return function() {
        if (!opt.oneWay) {
          $item.removeClass(opt.cycleClassName);
        }   

        $item.eq(index).addClass(opt.cycleClassName);
        index = (++index === max) ? 0 : index;

        if (opt.oneWay &&  index === 0) {
          global.clearInterval(timer);
        }   
      };  

    }());

    // 即実行したいなら
    opt.startImmediate && execCycle();
    timer = global.setInterval(execCycle, opt.duration);

  };  
  global.ClassCycler = ClassCycler;

}(this.self || global));