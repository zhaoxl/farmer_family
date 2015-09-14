(function($) {
	$.fn.validate = function(mycfg, subBtn) {
		var Cfg = [{
			v_element: '#v_mobile',
			rule: ['notnull', 'phone'],
			mes: {
				notnull: '不能为空',
				phone: '请输入正确的手机号码'

			},
		}, {
			v_element: '#v_name',
			rule: ['notnull'],
			mes: {
				notnull: '姓名不能为空'
			},
		}]
		var subBtn = $(subBtn)
		$.extend(true, Cfg, mycfg);
		var G_bool = false;

		function transformValidateFn(fn, args) {
			fn = eval(fn);
			if (typeof fn === 'function') {
				return fn.call(this, args);
			}
		}

		function transformErrorFn(fn, arg1, arg2, arg3) {
			fn = eval(fn);
			if (typeof fn === 'function') {
				fn.call(this, arg1, arg2, arg3);
			}
		}

		var validate = function(cfg) {
			cfg.forEach(function(item, index) {
				var _bool
				$(item.v_element).bind({
					'blur': function() {
						var _this = $(this);
						var _val = _this.val();
						item.rule.forEach(function(rule_item, index) {
							var _rulefn= 'ruleValidate.' + rule_item;
							_bool = transformValidateFn(_rulefn, _val) //转换执行每一次需求规则验证
							var _errorfn = 'errorValidate.' + rule_item
							transformErrorFn(_errorfn, _this, _bool, item.mes)
							G_bool = _bool
							if (_bool == false) {
								return 
							}
						})
					},
					'focus': function() {
						var _this = $(this);
						var _val = _this.val();
						if (_bool == false) {
							_this.css('color', '#4C4C4C').val('')
						}
					}
				})
			})
		}
		var ruleValidate = {
			notnull: function(value) {
				if (value == '') {
					return false
				} else {
					return true
				}
			},
			phone: function(value) {
				var reg = new RegExp("^[1][0-9]{10}$")
				return reg.test(value)
			}
		}
		var errorValidate = {
			notnull: function(element, _bool, mes) {
				if (!_bool) {
					element.css('color', '#FF2222').val(mes.notnull)
				}
			},
			phone: function(element, _bool, mes) {
				if (!_bool) {
					element.css('color', '#FF2222').val(mes.phone)
				}
			}
		}

		subBtn.bind('click', function() {
			Cfg.forEach(function(item, index) {
				//触发焦点
				$(item.v_element).blur()

			})
			console.log(G_bool)

		})
		validate(Cfg)


		//
		//Array.forEach implementation for IE support..  
		//https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Array/forEach  
		if (!Array.prototype.forEach) {
			Array.prototype.forEach = function(callback, thisArg) {
				var T, k;
				if (this == null) {
					throw new TypeError(" this is null or not defined");
				}
				var O = Object(this);
				var len = O.length >>> 0; // Hack to convert O.length to a UInt32  
				if ({}.toString.call(callback) != "[object Function]") {
					throw new TypeError(callback + " is not a function");
				}
				if (thisArg) {
					T = thisArg;
				}
				k = 0;
				while (k < len) {
					var kValue;
					if (k in O) {
						kValue = O[k];
						callback.call(T, kValue, k, O);
					}
					k++;
				}
			};
		}
	}
})(jQuery)