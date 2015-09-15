@extends('base')

@section('content')
	<link href="{{ asset('/css/area.css') }}" rel="stylesheet">
	<div class="body_content">
			<div class="search">
				<form>
					<input type="submit" value="搜索城市" class="submit" />
					<input type="text" class="text"/>
					<div class="hot">
						<span class="title">热门</span>
						<span class="links">
							<a href="#">北京</a>
							<a href="#">上海</a>
							<a href="#">广州</a>
							<a href="#">深圳</a>
							<a href="#">成都</a>
							<a href="#">杭州</a>
							<a href="#">南京</a>
							<a href="#">天津</a>
							<a href="#">武汉</a>
							<a href="#">重庆</a>
						</span>
					</div>
				</form>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						华东
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						山东
					</div>
					<div class="city">
						<a href="#">青岛</a>
						<a href="#">济南</a>
						<a href="#">烟台</a>
						<a href="#">潍坊</a>
						<a href="#">临沂</a>
						<a href="#">淄博</a>
						<a href="#">济宁</a>
						<a href="#">泰安</a>
						<a href="#">聊城</a>
						<a href="#">威海</a>
						<a href="#">枣庄</a>
						<a href="#">德州</a>
						<a href="#">日照</a>
						<a href="#">东营</a>
						<a href="#">菏泽</a>
						<a href="#">滨州</a>
						<a href="#">莱芜</a>
						<a href="#">章丘</a>
						<a href="#">垦利</a>
						<a href="#">诸城</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						江苏
					</div>
					<div class="city">
						<a href="#">苏州</a>
						<a href="#">南京</a>
						<a href="#">无锡</a>
						<a href="#">常州</a>
						<a href="#">徐州</a>
						<a href="#">南通</a>
						<a href="#">扬州</a>
						<a href="#">盐城</a>
						<a href="#">淮安</a>
						<a href="#">连云港</a>
						<a href="#">泰州</a>
						<a href="#">宿迁</a>
						<a href="#">镇江</a>
						<a href="#">沭阳</a>
						<a href="#">大丰</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						浙江
					</div>
					<div class="city">
						<a href="#">杭州</a>
						<a href="#">宁波</a>
						<a href="#">温州</a>
						<a href="#">金华</a>
						<a href="#">嘉兴</a>
						<a href="#">台州</a>
						<a href="#">绍兴</a>
						<a href="#">湖州</a>
						<a href="#">丽水</a>
						<a href="#">衢州</a>
						<a href="#">舟山</a>
						<a href="#">乐清</a>
						<a href="#">瑞安</a>
						<a href="#">义乌</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						安徽
					</div>
					<div class="city">
						<a href="http://hf.58.com/" onclick="co('hf')">合肥</a>
						<a href="http://wuhu.58.com/" onclick="co('wuhu')">芜湖</a>
						<a href="http://bengbu.58.com/" onclick="co('bengbu')">蚌埠</a>
						<a href="http://fy.58.com/" onclick="co('fy')">阜阳</a>
						<a href="http://hn.58.com/" onclick="co('hn')">淮南</a>
						<a href="http://anqing.58.com/" onclick="co('anqing')">安庆</a>
						<a href="http://suzhou.58.com/" onclick="co('suzhou')">宿州</a>
						<a href="http://la.58.com/" onclick="co('la')">六安</a>
						<a href="http://huaibei.58.com/" onclick="co('huaibei')">淮北</a>
						<a href="http://chuzhou.58.com/" onclick="co('chuzhou')">滁州</a>
						<a href="http://mas.58.com/" onclick="co('mas')">马鞍山</a>
						<a href="http://tongling.58.com/" onclick="co('tongling')">铜陵</a>
						<a href="http://xuancheng.58.com/" onclick="co('xuancheng')">宣城</a>
						<a href="http://bozhou.58.com/" onclick="co('bozhou')">亳州</a>
						<a href="http://huangshan.58.com/" onclick="co('huangshan')">黄山</a>
						<a href="http://chizhou.58.com/" onclick="co('chizhou')">池州</a>
						<a href="http://ch.58.com/" onclick="co('ch')">巢湖</a>
						<a href="http://hexian.58.com/" onclick="co('hexian')">和县</a>
						<a href="http://hq.58.com/" onclick="co('hq')">霍邱</a>
						<a href="http://tongcheng.58.com/" onclick="co('tongcheng')">桐城</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						华南
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						广东
					</div>
					<div class="city">
						<a href="http://sz.58.com/" onclick="co('sz')">深圳</a>
						<a href="http://gz.58.com/" onclick="co('gz')">广州</a>
						<a href="http://dg.58.com/" onclick="co('dg')">东莞</a>
						<a href="http://fs.58.com/" onclick="co('fs')">佛山</a>
						<a href="http://zs.58.com/" onclick="co('zs')">中山</a>
						<a href="http://zh.58.com/" onclick="co('zh')">珠海</a>
						<a href="http://huizhou.58.com/" onclick="co('huizhou')">惠州</a>
						<a href="http://jm.58.com/" onclick="co('jm')">江门</a>
						<a href="http://st.58.com/" onclick="co('st')">汕头</a>
						<a href="http://zhanjiang.58.com/" onclick="co('zhanjiang')">湛江</a>
						<a href="http://zq.58.com/" onclick="co('zq')">肇庆</a>
						<a href="http://mm.58.com/" onclick="co('mm')">茂名</a>
						<a href="http://jy.58.com/" onclick="co('jy')">揭阳</a>
						<a href="http://mz.58.com/" onclick="co('mz')">梅州</a>
						<a href="http://qingyuan.58.com/" onclick="co('qingyuan')">清远</a>
						<a href="http://yj.58.com/" onclick="co('yj')">阳江</a>
						<a href="http://sg.58.com/" onclick="co('sg')">韶关</a>
						<a href="http://heyuan.58.com/" onclick="co('heyuan')">河源</a>
						<a href="http://yf.58.com/" onclick="co('yf')">云浮</a>
						<a href="http://sw.58.com/" onclick="co('sw')">汕尾</a>
						<a href="http://chaozhou.58.com/" onclick="co('chaozhou')">潮州</a>
						<a href="http://taishan.58.com/" onclick="co('taishan')">台山</a>
						<a href="http://yangchun.58.com/" onclick="co('yangchun')">阳春</a>
						<a href="http://sd.58.com/" onclick="co('sd')">顺德</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						福建
					</div>
					<div class="city">
						<a href="http://fz.58.com/" onclick="co('fz')">福州</a>
						<a href="http://xm.58.com/" onclick="co('xm')">厦门</a>
						<a href="http://qz.58.com/" onclick="co('qz')">泉州</a>
						<a href="http://pt.58.com/" onclick="co('pt')">莆田</a>
						<a href="http://zhangzhou.58.com/" onclick="co('zhangzhou')">漳州</a>
						<a href="http://nd.58.com/" onclick="co('nd')">宁德</a>
						<a href="http://sm.58.com/" onclick="co('sm')">三明</a>
						<a href="http://np.58.com/" onclick="co('np')">南平</a>
						<a href="http://ly.58.com/" onclick="co('ly')">龙岩</a>
						<a href="http://wuyishan.58.com/" onclick="co('wuyishan')">武夷山</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						广西
					</div>
					<div class="city">
						<a href="http://nn.58.com/" onclick="co('nn')">南宁</a>
						<a href="http://liuzhou.58.com/" onclick="co('liuzhou')">柳州</a>
						<a href="http://gl.58.com/" onclick="co('gl')">桂林</a>
						<a href="http://yulin.58.com/" onclick="co('yulin')">玉林</a>
						<a href="http://wuzhou.58.com/" onclick="co('wuzhou')">梧州</a>
						<a href="http://bh.58.com/" onclick="co('bh')">北海</a>
						<a href="http://gg.58.com/" onclick="co('gg')">贵港</a>
						<a href="http://qinzhou.58.com/" onclick="co('qinzhou')">钦州</a>
						<a href="http://baise.58.com/" onclick="co('baise')">百色</a>
						<a href="http://hc.58.com/" onclick="co('hc')">河池</a>
						<a href="http://lb.58.com/" onclick="co('lb')">来宾</a>
						<a href="http://hezhou.58.com/" onclick="co('hezhou')">贺州</a>
						<a href="http://fcg.58.com/" onclick="co('fcg')">防城港</a>
						<a href="http://chongzuo.58.com/" onclick="co('chongzuo')">崇左</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						海南
					</div>
					<div class="city">
						<a href="http://haikou.58.com/" onclick="co('haikou')">海口</a>
						<a href="http://sanya.58.com/" onclick="co('sanya')">三亚</a>
						<a href="http://wzs.58.com/" onclick="co('wzs')">五指山</a>
						<a href="http://sansha.58.com/" onclick="co('sansha')">三沙</a>
						<a href="http://qh.58.com/" onclick="co('qionghai')">琼海</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						中南
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						河南
					</div>
					<div class="city">
						<a href="http://zz.58.com/" onclick="co('zz')">郑州</a>
						<a href="http://luoyang.58.com/" onclick="co('luoyang')">洛阳</a>
						<a href="http://xx.58.com/" onclick="co('xx')">新乡</a>
						<a href="http://ny.58.com/" onclick="co('ny')">南阳</a>
						<a href="http://xc.58.com/" onclick="co('xc')">许昌</a>
						<a href="http://pds.58.com/" onclick="co('pds')">平顶山</a>
						<a href="http://ay.58.com/" onclick="co('ay')">安阳</a>
						<a href="http://jiaozuo.58.com/" onclick="co('jiaozuo')">焦作</a>
						<a href="http://sq.58.com/" onclick="co('sq')">商丘</a>
						<a href="http://kaifeng.58.com/" onclick="co('kaifeng')">开封</a>
						<a href="http://puyang.58.com/" onclick="co('puyang')">濮阳</a>
						<a href="http://zk.58.com/" onclick="co('zk')">周口</a>
						<a href="http://xy.58.com/" onclick="co('xy')">信阳</a>
						<a href="http://zmd.58.com/" onclick="co('zmd')">驻马店</a>
						<a href="http://luohe.58.com/" onclick="co('luohe')">漯河</a>
						<a href="http://smx.58.com/" onclick="co('smx')">三门峡</a>
						<a href="http://hb.58.com/" onclick="co('hb')">鹤壁</a>
						<a href="http://jiyuan.58.com/" onclick="co('jiyuan')">济源</a>
						<a href="http://mg.58.com/" onclick="co('mg')">明港</a>
						<a href="http://yanling.58.com/" onclick="co('yanling')">鄢陵</a>
						<a href="http://yuzhou.58.com/" onclick="co('yuzhou')">禹州</a>
						<a href="http://changge.58.com/" onclick="co('changge')">长葛</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						湖北
					</div>
					<div class="city">
						<a href="http://wh.58.com/" onclick="co('wh')">武汉</a>
						<a href="http://yc.58.com/" onclick="co('yc')">宜昌</a>
						<a href="http://xf.58.com/" onclick="co('xf')">襄阳</a>
						<a href="http://jingzhou.58.com/" onclick="co('jingzhou')">荆州</a>
						<a href="http://shiyan.58.com/" onclick="co('shiyan')">十堰</a>
						<a href="http://hshi.58.com/" onclick="co('hshi')">黄石</a>
						<a href="http://xiaogan.58.com/" onclick="co('xiaogan')">孝感</a>
						<a href="http://hg.58.com/" onclick="co('hg')">黄冈</a>
						<a href="http://es.58.com/" onclick="co('es')">恩施</a>
						<a href="http://jingmen.58.com/" onclick="co('jingmen')">荆门</a>
						<a href="http://xianning.58.com/" onclick="co('xianning')">咸宁</a>
						<a href="http://ez.58.com/" onclick="co('ez')">鄂州</a>
						<a href="http://suizhou.58.com/" onclick="co('suizhou')">随州</a>
						<a href="http://qianjiang.58.com/" onclick="co('qianjiang')">潜江</a>
						<a href="http://tm.58.com/" onclick="co('tm')">天门</a>
						<a href="http://xiantao.58.com/" onclick="co('xiantao')">仙桃</a>
						<a href="http://snj.58.com/" onclick="co('snj')">神农架</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						湖南
					</div>
					<div class="city">
						<a href="http://cs.58.com/" onclick="co('cs')">长沙</a>
						<a href="http://zhuzhou.58.com/" onclick="co('zhuzhou')">株洲</a>
						<a href="http://yiyang.58.com/" onclick="co('yiyang')">益阳</a>
						<a href="http://changde.58.com/" onclick="co('changde')">常德</a>
						<a href="http://hy.58.com/" onclick="co('hy')">衡阳</a>
						<a href="http://xiangtan.58.com/" onclick="co('xiangtan')">湘潭</a>
						<a href="http://yy.58.com/" onclick="co('yy')">岳阳</a>
						<a href="http://chenzhou.58.com/" onclick="co('chenzhou')">郴州</a>
						<a href="http://shaoyang.58.com/" onclick="co('shaoyang')">邵阳</a>
						<a href="http://hh.58.com/" onclick="co('hh')">怀化</a>
						<a href="http://yongzhou.58.com/" onclick="co('yongzhou')">永州</a>
						<a href="http://ld.58.com/" onclick="co('ld')">娄底</a>
						<a href="http://xiangxi.58.com/" onclick="co('xiangxi')">湘西</a>
						<a href="http://zjj.58.com/" onclick="co('zjj')">张家界</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						江西
					</div>
					<div class="city">
						<a href="http://nc.58.com/" onclick="co('nc')">南昌</a>
						<a href="http://ganzhou.58.com/" onclick="co('ganzhou')">赣州</a>
						<a href="http://jj.58.com/" onclick="co('jj')">九江</a>
						<a href="http://yichun.58.com/" onclick="co('yichun')">宜春</a>
						<a href="http://ja.58.com/" onclick="co('ja')">吉安</a>
						<a href="http://sr.58.com/" onclick="co('sr')">上饶</a>
						<a href="http://px.58.com/" onclick="co('px')">萍乡</a>
						<a href="http://fuzhou.58.com/" onclick="co('fuzhou')">抚州</a>
						<a href="http://jdz.58.com/" onclick="co('jdz')">景德镇</a>
						<a href="http://xinyu.58.com/" onclick="co('xinyu')">新余</a>
						<a href="http://yingtan.58.com/" onclick="co('yingtan')">鹰潭</a>
						<a href="http://yxx.58.com/" onclick="co('yxx')">永新</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						东北
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						辽宁
					</div>
					<div class="city">
						<a href="http://sy.58.com/" onclick="co('sy')">沈阳</a>
						<a href="http://dl.58.com/" onclick="co('dl')">大连</a>
						<a href="http://as.58.com/" onclick="co('as')">鞍山</a>
						<a href="http://jinzhou.58.com/" onclick="co('jinzhou')">锦州</a>
						<a href="http://fushun.58.com/" onclick="co('fushun')">抚顺</a>
						<a href="http://yk.58.com/" onclick="co('yk')">营口</a>
						<a href="http://pj.58.com/" onclick="co('pj')">盘锦</a>
						<a href="http://cy.58.com/" onclick="co('cy')">朝阳</a>
						<a href="http://dandong.58.com/" onclick="co('dandong')">丹东</a>
						<a href="http://liaoyang.58.com/" onclick="co('liaoyang')">辽阳</a>
						<a href="http://benxi.58.com/" onclick="co('benxi')">本溪</a>
						<a href="http://hld.58.com/" onclick="co('hld')">葫芦岛</a>
						<a href="http://tl.58.com/" onclick="co('tl')">铁岭</a>
						<a href="http://fx.58.com/" onclick="co('fx')">阜新</a>
						<a href="http://pld.58.com/" onclick="co('pld')">庄河</a>
						<a href="http://wfd.58.com/" onclick="co('wfd')">瓦房店</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						黑龙江
					</div>
					<div class="city">
						<a href="http://hrb.58.com/" onclick="co('hrb')">哈尔滨</a>
						<a href="http://dq.58.com/" onclick="co('dq')">大庆</a>
						<a href="http://qqhr.58.com/" onclick="co('qqhr')">齐齐哈尔</a>
						<a href="http://mdj.58.com/" onclick="co('mdj')">牡丹江</a>
						<a href="http://suihua.58.com/" onclick="co('suihua')">绥化</a>
						<a href="http://jms.58.com/" onclick="co('jms')">佳木斯</a>
						<a href="http://jixi.58.com/" onclick="co('jixi')">鸡西</a>
						<a href="http://sys.58.com/" onclick="co('sys')">双鸭山</a>
						<a href="http://hegang.58.com/" onclick="co('hegang')">鹤岗</a>
						<a href="http://heihe.58.com/" onclick="co('heihe')">黑河</a>
						<a href="http://yich.58.com/" onclick="co('yich')">伊春</a>
						<a href="http://qth.58.com/" onclick="co('qth')">七台河</a>
						<a href="http://dxal.58.com/" onclick="co('dxal')">大兴安岭</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						吉林
					</div>
					<div class="city">
						<a href="http://cc.58.com/" onclick="co('cc')">长春</a>
						<a href="http://jl.58.com/" onclick="co('jl')">吉林</a>
						<a href="http://sp.58.com/" onclick="co('sp')">四平</a>
						<a href="http://yanbian.58.com/" onclick="co('yanbian')">延边</a>
						<a href="http://songyuan.58.com/" onclick="co('songyuan')">松原</a>
						<a href="http://bc.58.com/" onclick="co('bc')">白城</a>
						<a href="http://th.58.com/" onclick="co('th')">通化</a>
						<a href="http://baishan.58.com/" onclick="co('baishan')">白山</a>
						<a href="http://liaoyuan.58.com/" onclick="co('liaoyuan')">辽源</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						西南
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						四川
					</div>
					<div class="city">
						<a href="http://cd.58.com/" onclick="co('cd')">成都</a>
						<a href="http://mianyang.58.com/" onclick="co('mianyang')">绵阳</a>
						<a href="http://deyang.58.com/" onclick="co('deyang')">德阳</a>
						<a href="http://nanchong.58.com/" onclick="co('nanchong')">南充</a>
						<a href="http://yb.58.com/" onclick="co('yb')">宜宾</a>
						<a href="http://zg.58.com/" onclick="co('zg')">自贡</a>
						<a href="http://ls.58.com/" onclick="co('ls')">乐山</a>
						<a href="http://luzhou.58.com/" onclick="co('luzhou')">泸州</a>
						<a href="http://dazhou.58.com/" onclick="co('dazhou')">达州</a>
						<a href="http://scnj.58.com/" onclick="co('scnj')">内江</a>
						<a href="http://suining.58.com/" onclick="co('suining')">遂宁</a>
						<a href="http://panzhihua.58.com/" onclick="co('panzhihua')">攀枝花</a>
						<a href="http://ms.58.com/" onclick="co('ms')">眉山</a>
						<a href="http://ga.58.com/" onclick="co('ga')">广安</a>
						<a href="http://zy.58.com/" onclick="co('zy')">资阳</a>
						<a href="http://liangshan.58.com/" onclick="co('liangshan')">凉山</a>
						<a href="http://guangyuan.58.com/" onclick="co('guangyuan')">广元</a>
						<a href="http://ya.58.com/" onclick="co('ya')">雅安</a>
						<a href="http://bazhong.58.com/" onclick="co('bazhong')">巴中</a>
						<a href="http://ab.58.com/" onclick="co('ab')">阿坝</a>
						<a href="http://ganzi.58.com/" onclick="co('ganzi')">甘孜</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						云南
					</div>
					<div class="city">
						<a href="http://km.58.com/" onclick="co('km')">昆明</a>
						<a href="http://qj.58.com/" onclick="co('qj')">曲靖</a>
						<a href="http://dali.58.com/" onclick="co('dali')">大理</a>
						<a href="http://honghe.58.com/" onclick="co('honghe')">红河</a>
						<a href="http://yx.58.com/" onclick="co('yx')">玉溪</a>
						<a href="http://lj.58.com/" onclick="co('lj')">丽江</a>
						<a href="http://ws.58.com/" onclick="co('ws')">文山</a>
						<a href="http://cx.58.com/" onclick="co('cx')">楚雄</a>
						<a href="http://bn.58.com/" onclick="co('bn')">西双版纳</a>
						<a href="http://zt.58.com/" onclick="co('zt')">昭通</a>
						<a href="http://dh.58.com/" onclick="co('dh')">德宏</a>
						<a href="http://pe.58.com/" onclick="co('pe')">普洱</a>
						<a href="http://bs.58.com/" onclick="co('bs')">保山</a>
						<a href="http://lincang.58.com/" onclick="co('lincang')">临沧</a>
						<a href="http://diqing.58.com/" onclick="co('diqing')">迪庆</a>
						<a href="http://nujiang.58.com/" onclick="co('nujiang')">怒江</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						贵州
					</div>
					<div class="city">
						<a href="http://gy.58.com/" onclick="co('gy')">贵阳</a>
						<a href="http://zunyi.58.com/" onclick="co('zunyi')">遵义</a>
						<a href="http://qdn.58.com/" onclick="co('qdn')">黔东南</a>
						<a href="http://qn.58.com/" onclick="co('qn')">黔南</a>
						<a href="http://lps.58.com/" onclick="co('lps')">六盘水</a>
						<a href="http://bijie.58.com/" onclick="co('bijie')">毕节</a>
						<a href="http://tr.58.com/" onclick="co('tr')">铜仁</a>
						<a href="http://anshun.58.com/" onclick="co('anshun')">安顺</a>
						<a href="http://qxn.58.com/" onclick="co('qxn')">黔西南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						西藏
					</div>
					<div class="city">
						<a href="http://lasa.58.com/" onclick="co('lasa')">拉萨</a>
						<a href="http://rkz.58.com/" onclick="co('rkz')">日喀则</a>
						<a href="http://sn.58.com/" onclick="co('sn')">山南</a>
						<a href="http://linzhi.58.com/" onclick="co('linzhi')">林芝</a>
						<a href="http://changdu.58.com/" onclick="co('changdu')">昌都</a>
						<a href="http://nq.58.com/" onclick="co('nq')">那曲</a>
						<a href="http://al.58.com/" onclick="co('al')">阿里</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						华北
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						河北
					</div>
					<div class="city">
						<a href="http://sjz.58.com/" onclick="co('sjz')">石家庄</a>
						<a href="http://bd.58.com/" onclick="co('bd')">保定</a>
						<a href="http://ts.58.com/" onclick="co('ts')">唐山</a>
						<a href="http://lf.58.com/" onclick="co('lf')">廊坊</a>
						<a href="http://hd.58.com/" onclick="co('hd')">邯郸</a>
						<a href="http://qhd.58.com/" onclick="co('qhd')">秦皇岛</a>
						<a href="http://cangzhou.58.com/" onclick="co('cangzhou')">沧州</a>
						<a href="http://xt.58.com/" onclick="co('xt')">邢台</a>
						<a href="http://hs.58.com/" onclick="co('hs')">衡水</a>
						<a href="http://zjk.58.com/" onclick="co('zjk')">张家口</a>
						<a href="http://chengde.58.com/" onclick="co('chengde')">承德</a>
						<a href="http://dingzhou.58.com/" onclick="co('dingzhou')">定州</a>
						<a href="http://gt.58.com/" onclick="co('gt')">馆陶</a>
						<a href="http://zhangbei.58.com/" onclick="co('zhangbei')">张北</a>
						<a href="http://zx.58.com/" onclick="co('zx')">赵县</a>
						<a href="http://zd.58.com/" onclick="co('zd')">正定</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						山西
					</div>
					<div class="city">
						<a href="http://ty.58.com/" onclick="co('ty')">太原</a>
						<a href="http://linfen.58.com/" onclick="co('linfen')">临汾</a>
						<a href="http://dt.58.com/" onclick="co('dt')">大同</a>
						<a href="http://yuncheng.58.com/" onclick="co('yuncheng')">运城</a>
						<a href="http://jz.58.com/" onclick="co('jz')">晋中</a>
						<a href="http://changzhi.58.com/" onclick="co('changzhi')">长治</a>
						<a href="http://jincheng.58.com/" onclick="co('jincheng')">晋城</a>
						<a href="http://yq.58.com/" onclick="co('yq')">阳泉</a>
						<a href="http://lvliang.58.com/" onclick="co('lvliang')">吕梁</a>
						<a href="http://xinzhou.58.com/" onclick="co('xinzhou')">忻州</a>
						<a href="http://shuozhou.58.com/" onclick="co('shuozhou')">朔州</a>
						<a href="http://linyixian.58.com/" onclick="co('linyixian')">临猗</a>
						<a href="http://qingxu.58.com/" onclick="co('qingxu')">清徐</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						内蒙古
					</div>
					<div class="city">
						<a href="http://hu.58.com/" onclick="co('hu')">呼和浩特</a>
						<a href="http://bt.58.com/" onclick="co('bt')">包头</a>
						<a href="http://chifeng.58.com/" onclick="co('chifeng')">赤峰</a>
						<a href="http://erds.58.com/" onclick="co('erds')">鄂尔多斯</a>
						<a href="http://tongliao.58.com/" onclick="co('tongliao')">通辽</a>
						<a href="http://hlbe.58.com/" onclick="co('hlbe')">呼伦贝尔</a>
						<a href="http://bycem.58.com/" onclick="co('bycem')">巴彦淖尔市</a>
						<a href="http://wlcb.58.com/" onclick="co('wlcb')">乌兰察布</a>
						<a href="http://xl.58.com/" onclick="co('xl')">锡林郭勒盟</a>
						<a href="http://xam.58.com/" onclick="co('xam')">兴安盟</a>
						<a href="http://wuhai.58.com/" onclick="co('wuhai')">乌海</a>
						<a href="http://alsm.58.com/" onclick="co('alsm')">阿拉善盟</a>
						<a href="http://hlr.58.com/" onclick="co('hlr')">海拉尔</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						西藏
					</div>
					<div class="city">
						<a href="http://lasa.58.com/" onclick="co('lasa')">拉萨</a>
						<a href="http://rkz.58.com/" onclick="co('rkz')">日喀则</a>
						<a href="http://sn.58.com/" onclick="co('sn')">山南</a>
						<a href="http://linzhi.58.com/" onclick="co('linzhi')">林芝</a>
						<a href="http://changdu.58.com/" onclick="co('changdu')">昌都</a>
						<a href="http://nq.58.com/" onclick="co('nq')">那曲</a>
						<a href="http://al.58.com/" onclick="co('al')">阿里</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						西北
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						陕西
					</div>
					<div class="city">
						<a href="http://xa.58.com/" onclick="co('xa')">西安</a>
						<a href="http://xianyang.58.com/" onclick="co('xianyang')">咸阳</a>
						<a href="http://baoji.58.com/" onclick="co('baoji')">宝鸡</a>
						<a href="http://wn.58.com/" onclick="co('wn')">渭南</a>
						<a href="http://hanzhong.58.com/" onclick="co('hanzhong')">汉中</a>
						<a href="http://yl.58.com/" onclick="co('yl')">榆林</a>
						<a href="http://yanan.58.com/" onclick="co('yanan')">延安</a>
						<a href="http://ankang.58.com/" onclick="co('ankang')">安康</a>
						<a href="http://sl.58.com/" onclick="co('sl')">商洛</a>
						<a href="http://tc.58.com/" onclick="co('tc')">铜川</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						新疆
					</div>
					<div class="city">
						<a href="http://xj.58.com/" onclick="co('xj')">乌鲁木齐</a>
						<a href="http://changji.58.com/" onclick="co('changji')">昌吉</a>
						<a href="http://bygl.58.com/" onclick="co('bygl')">巴音郭楞</a>
						<a href="http://yili.58.com/" onclick="co('yili')">伊犁</a>
						<a href="http://aks.58.com/" onclick="co('aks')">阿克苏</a>
						<a href="http://ks.58.com/" onclick="co('ks')">喀什</a>
						<a href="http://hami.58.com/" onclick="co('hami')">哈密</a>
						<a href="http://klmy.58.com/" onclick="co('klmy')">克拉玛依</a>
						<a href="http://betl.58.com/" onclick="co('betl')">博尔塔拉</a>
						<a href="http://tlf.58.com/" onclick="co('tlf')">吐鲁番</a>
						<a href="http://ht.58.com/" onclick="co('ht')">和田</a>
						<a href="http://shz.58.com/" onclick="co('shz')">石河子</a>
						<a href="http://kzls.58.com/" onclick="co('kzls')">克孜勒苏</a>
						<a href="http://ale.58.com/" onclick="co('ale')">阿拉尔</a>
						<a href="http://wjq.58.com/" onclick="co('wjq')">五家渠</a>
						<a href="http://tmsk.58.com/" onclick="co('tmsk')">图木舒克</a>
						<a href="http://kel.58.com/" onclick="co('kel')">库尔勒</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						甘肃
					</div>
					<div class="city">
						<a href="http://lz.58.com/" onclick="co('lz')">兰州</a>
						<a href="http://tianshui.58.com/" onclick="co('tianshui')">天水</a>
						<a href="http://by.58.com/" onclick="co('by')">白银</a>
						<a href="http://qingyang.58.com/" onclick="co('qingyang')">庆阳</a>
						<a href="http://pl.58.com/" onclick="co('pl')">平凉</a>
						<a href="http://jq.58.com/" onclick="co('jq')">酒泉</a>
						<a href="http://zhangye.58.com/" onclick="co('zhangye')">张掖</a>
						<a href="http://wuwei.58.com/" onclick="co('wuwei')">武威</a>
						<a href="http://dx.58.com/" onclick="co('dx')">定西</a>
						<a href="http://jinchang.58.com/" onclick="co('jinchang')">金昌</a>
						<a href="http://ln.58.com/" onclick="co('ln')">陇南</a>
						<a href="http://linxia.58.com/" onclick="co('linxia')">临夏</a>
						<a href="http://jyg.58.com/" onclick="co('jyg')">嘉峪关</a>
						<a href="http://gn.58.com/" onclick="co('gn')">甘南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						宁夏
					</div>
					<div class="city">
						<a href="http://yinchuan.58.com/" onclick="co('yinchuan')">银川</a>
						<a href="http://wuzhong.58.com/" onclick="co('wuzhong')">吴忠</a>
						<a href="http://szs.58.com/" onclick="co('szs')">石嘴山</a>
						<a href="http://zw.58.com/" onclick="co('zw')">中卫</a>
						<a href="http://guyuan.58.com/" onclick="co('guyuan')">固原</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
				<div class="row">
					<div class="province">
						青海
					</div>
					<div class="city">
						<a href="http://xn.58.com/" onclick="co('xn')">西宁</a>
						<a href="http://hx.58.com/" onclick="co('hx')">海西</a>
						<a href="http://haibei.58.com/" onclick="co('haibei')">海北</a>
						<a href="http://guoluo.58.com/" onclick="co('guoluo')">果洛</a>
						<a href="http://haidong.58.com/" onclick="co('haidong')">海东</a>
						<a href="http://huangnan.58.com/" onclick="co('huangnan')">黄南</a>
						<a href="http://ys.58.com/" onclick="co('ys')">玉树</a>
						<a href="http://hainan.58.com/" onclick="co('hainan')">海南</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
			<div class="area_list">
				<div>
					<div class="area_name">
						其他
					</div>
					<div class="area_name_line"></div>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="province">
						其他
					</div>
					<div class="city">
						<a href="http://hk.58.com/" onclick="co('hk')">香港</a>
						<a href="http://am.58.com/" onclick="co('am')">澳门</a>
						<a href="http://tw.58.com/" onclick="co('tw')">台湾</a>
						<a href="http://diaoyudao.58.com/" onclick="co('diaoyudao')">钓鱼岛</a>
						<a href="http://cn.58.com/" onclick="co('cn')">其他</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
		</div>
@endsection


cities = [["110100","北京市"]
,["130100","石家庄市"]
,["130200","唐山市"]
,["130300","秦皇岛市"]
,["130400","邯郸市"]
,["130500","邢台市"]
,["130600","保定市"]
,["130700","张家口市"]
,["130800","承德市"]
,["130900","沧州市"]
,["131000","廊坊市"]
,["131100","衡水市"]
,["140100","太原市"]
,["140200","大同市"]
,["140300","阳泉市"]
,["140400","长治市"]
,["140500","晋城市"]
,["140600","朔州市"]
,["140700","晋中市"]
,["140800","运城市"]
,["140900","忻州市"]
,["141000","临汾市"]
,["141100","吕梁市"]
,["150100","呼和浩特市"]
,["150200","包头市"]
,["150300","乌海市"]
,["150400","赤峰市"]
,["150500","通辽市"]
,["150600","鄂尔多斯市"]
,["150700","呼伦贝尔市"]
,["150800","巴彦淖尔市"]
,["150900","乌兰察布市"]
,["152200","兴安盟"]
,["152500","锡林郭勒盟"]
,["152900","阿拉善盟"]
,["210100","沈阳市"]
,["210200","大连市"]
,["210300","鞍山市"]
,["210400","抚顺市"]
,["210500","本溪市"]
,["210600","丹东市"]
,["210700","锦州市"]
,["210800","营口市"]
,["210900","阜新市"]
,["211000","辽阳市"]
,["211100","盘锦市"]
,["211200","铁岭市"]
,["211300","朝阳市"]
,["211400","葫芦岛市"]
,["220100","长春市"]
,["220200","吉林市"]
,["220300","四平市"]
,["220400","辽源市"]
,["220500","通化市"]
,["220600","白山市"]
,["220700","松原市"]
,["220800","白城市"]
,["222400","延边朝鲜族自治州"]
,["230100","哈尔滨市"]
,["230200","齐齐哈尔市"]
,["230300","鸡西市"]
,["230400","鹤岗市"]
,["230500","双鸭山市"]
,["230600","大庆市"]
,["230700","伊春市"]
,["230800","佳木斯市"]
,["230900","七台河市"]
,["231000","牡丹江市"]
,["231100","黑河市"]
,["231200","绥化市"]
,["232700","大兴安岭地区"]
,["310100","市辖区"]
,["310200","县"]
,["320100","南京市"]
,["320200","无锡市"]
,["320300","徐州市"]
,["320400","常州市"]
,["320500","苏州市"]
,["320600","南通市"]
,["320700","连云港市"]
,["320800","淮安市"]
,["320900","盐城市"]
,["321000","扬州市"]
,["321100","镇江市"]
,["321200","泰州市"]
,["321300","宿迁市"]
,["330100","杭州市"]
,["330200","宁波市"]
,["330300","温州市"]
,["330400","嘉兴市"]
,["330500","湖州市"]
,["330600","绍兴市"]
,["330700","金华市"]
,["330800","衢州市"]
,["330900","舟山市"]
,["331000","台州市"]
,["331100","丽水市"]
,["340100","合肥市"]
,["340200","芜湖市"]
,["340300","蚌埠市"]
,["340400","淮南市"]
,["340500","马鞍山市"]
,["340600","淮北市"]
,["340700","铜陵市"]
,["340800","安庆市"]
,["341000","黄山市"]
,["341100","滁州市"]
,["341200","阜阳市"]
,["341300","宿州市"]
,["341400","巢湖市"]
,["341500","六安市"]
,["341600","亳州市"]
,["341700","池州市"]
,["341800","宣城市"]
,["350100","福州市"]
,["350200","厦门市"]
,["350300","莆田市"]
,["350400","三明市"]
,["350500","泉州市"]
,["350600","漳州市"]
,["350700","南平市"]
,["350800","龙岩市"]
,["350900","宁德市"]
,["360100","南昌市"]
,["360200","景德镇市"]
,["360300","萍乡市"]
,["360400","九江市"]
,["360500","新余市"]
,["360600","鹰潭市"]
,["360700","赣州市"]
,["360800","吉安市"]
,["360900","宜春市"]
,["361000","抚州市"]
,["361100","上饶市"]
,["370100","济南市"]
,["370200","青岛市"]
,["370300","淄博市"]
,["370400","枣庄市"]
,["370500","东营市"]
,["370600","烟台市"]
,["370700","潍坊市"]
,["370800","济宁市"]
,["370900","泰安市"]
,["371000","威海市"]
,["371100","日照市"]
,["371200","莱芜市"]
,["371300","临沂市"]
,["371400","德州市"]
,["371500","聊城市"]
,["371600","滨州市"]
,["371700","荷泽市"]
,["410100","郑州市"]
,["410200","开封市"]
,["410300","洛阳市"]
,["410400","平顶山市"]
,["410500","安阳市"]
,["410600","鹤壁市"]
,["410700","新乡市"]
,["410800","焦作市"]
,["410900","濮阳市"]
,["411000","许昌市"]
,["411100","漯河市"]
,["411200","三门峡市"]
,["411300","南阳市"]
,["411400","商丘市"]
,["411500","信阳市"]
,["411600","周口市"]
,["411700","驻马店市"]
,["420100","武汉市"]
,["420200","黄石市"]
,["420300","十堰市"]
,["420500","宜昌市"]
,["420600","襄樊市"]
,["420700","鄂州市"]
,["420800","荆门市"]
,["420900","孝感市"]
,["421000","荆州市"]
,["421100","黄冈市"]
,["421200","咸宁市"]
,["421300","随州市"]
,["422800","恩施土家族苗族自治州"]
,["429000","省直辖行政单位"]
,["430100","长沙市"]
,["430200","株洲市"]
,["430300","湘潭市"]
,["430400","衡阳市"]
,["430500","邵阳市"]
,["430600","岳阳市"]
,["430700","常德市"]
,["430800","张家界市"]
,["430900","益阳市"]
,["431000","郴州市"]
,["431100","永州市"]
,["431200","怀化市"]
,["431300","娄底市"]
,["433100","湘西土家族苗族自治州"]
,["440100","广州市"]
,["440200","韶关市"]
,["440300","深圳市"]
,["440400","珠海市"]
,["440500","汕头市"]
,["440600","佛山市"]
,["440700","江门市"]
,["440800","湛江市"]
,["440900","茂名市"]
,["441200","肇庆市"]
,["441300","惠州市"]
,["441400","梅州市"]
,["441500","汕尾市"]
,["441600","河源市"]
,["441700","阳江市"]
,["441800","清远市"]
,["441900","东莞市"]
,["442000","中山市"]
,["445100","潮州市"]
,["445200","揭阳市"]
,["445300","云浮市"]
,["450100","南宁市"]
,["450200","柳州市"]
,["450300","桂林市"]
,["450400","梧州市"]
,["450500","北海市"]
,["450600","防城港市"]
,["450700","钦州市"]
,["450800","贵港市"]
,["450900","玉林市"]
,["451000","百色市"]
,["451100","贺州市"]
,["451200","河池市"]
,["451300","来宾市"]
,["451400","崇左市"]
,["460100","海口市"]
,["460200","三亚市"]
,["469000","省直辖县级行政单位"]
,["500100","市辖区"]
,["500200","县"]
,["500300","市"]
,["510100","成都市"]
,["510300","自贡市"]
,["510400","攀枝花市"]
,["510500","泸州市"]
,["510600","德阳市"]
,["510700","绵阳市"]
,["510800","广元市"]
,["510900","遂宁市"]
,["511000","内江市"]
,["511100","乐山市"]
,["511300","南充市"]
,["511400","眉山市"]
,["511500","宜宾市"]
,["511600","广安市"]
,["511700","达州市"]
,["511800","雅安市"]
,["511900","巴中市"]
,["512000","资阳市"]
,["513200","阿坝藏族羌族自治州"]
,["513300","甘孜藏族自治州"]
,["513400","凉山彝族自治州"]
,["520100","贵阳市"]
,["520200","六盘水市"]
,["520300","遵义市"]
,["520400","安顺市"]
,["522200","铜仁地区"]
,["522300","黔西南布依族苗族自治州"]
,["522400","毕节地区"]
,["522600","黔东南苗族侗族自治州"]
,["522700","黔南布依族苗族自治州"]
,["530100","昆明市"]
,["530300","曲靖市"]
,["530400","玉溪市"]
,["530500","保山市"]
,["530600","昭通市"]
,["530700","丽江市"]
,["530800","思茅市"]
,["530900","临沧市"]
,["532300","楚雄彝族自治州"]
,["532500","红河哈尼族彝族自治州"]
,["532600","文山壮族苗族自治州"]
,["532800","西双版纳傣族自治州"]
,["532900","大理白族自治州"]
,["533100","德宏傣族景颇族自治州"]
,["533300","怒江傈僳族自治州"]
,["533400","迪庆藏族自治州"]
,["540100","拉萨市"]
,["542100","昌都地区"]
,["542200","山南地区"]
,["542300","日喀则地区"]
,["542400","那曲地区"]
,["542500","阿里地区"]
,["542600","林芝地区"]
,["610100","西安市"]
,["610200","铜川市"]
,["610300","宝鸡市"]
,["610400","咸阳市"]
,["610500","渭南市"]
,["610600","延安市"]
,["610700","汉中市"]
,["610800","榆林市"]
,["610900","安康市"]
,["611000","商洛市"]
,["620100","兰州市"]
,["620200","嘉峪关市"]
,["620300","金昌市"]
,["620400","白银市"]
,["620500","天水市"]
,["620600","武威市"]
,["620700","张掖市"]
,["620800","平凉市"]
,["620900","酒泉市"]
,["621000","庆阳市"]
,["621100","定西市"]
,["621200","陇南市"]
,["622900","临夏回族自治州"]
,["623000","甘南藏族自治州"]
,["630100","西宁市"]
,["632100","海东地区"]
,["632200","海北藏族自治州"]
,["632300","黄南藏族自治州"]
,["632500","海南藏族自治州"]
,["632600","果洛藏族自治州"]
,["632700","玉树藏族自治州"]
,["632800","海西蒙古族藏族自治州"]
,["640100","银川市"]
,["640200","石嘴山市"]
,["640300","吴忠市"]
,["640400","固原市"]
,["640500","中卫市"]
,["650100","乌鲁木齐市"]
,["650200","克拉玛依市"]
,["652100","吐鲁番地区"]
,["652200","哈密地区"]
,["652300","昌吉回族自治州"]
,["652700","博尔塔拉蒙古自治州"]
,["652800","巴音郭楞蒙古自治州"]
,["652900","阿克苏地区"]
,["653000","克孜勒苏柯尔克孜自治州"]
,["653100","喀什地区"]
,["653200","和田地区"]
,["654000","伊犁哈萨克自治州"]
,["654200","塔城地区"]
,["654300","阿勒泰地区"]
,["659000","省直辖行政单位"]]