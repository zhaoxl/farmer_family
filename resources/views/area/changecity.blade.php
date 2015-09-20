@extends('base')

@section('title')切换城市@endsection

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
							<a href='/area/set?name=北京&code=110100'>北京</a>
							<a href="/area/set?name=上海&code=310000">上海</a>
							<a href='/area/set?name=广州&code=440100'>广州</a>
							<a href='/area/set?name=深圳&code=440300'>深圳</a>
							<a href='/area/set?name=成都&code=510100'>成都</a>
							<a href='/area/set?name=杭州&code=330100'>杭州</a>
							<a href='/area/set?name=南京&code=320100'>南京</a>
							<a href="/area/set?name=天津&code=120000">天津</a>
							<a href='/area/set?name=武汉&code=420100'>武汉</a>
							<a href="/area/set?name=重庆&code=500000">重庆</a>
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
						<a href='/area/set?name=青岛&code=370200'>青岛</a>
						<a href='/area/set?name=济南&code=370100'>济南</a>
						<a href='/area/set?name=烟台&code=370600'>烟台</a>
						<a href='/area/set?name=潍坊&code=370700'>潍坊</a>
						<a href='/area/set?name=临沂&code=371300'>临沂</a>
						<a href='/area/set?name=淄博&code=370300'>淄博</a>
						<a href='/area/set?name=济宁&code=370800'>济宁</a>
						<a href='/area/set?name=泰安&code=370900'>泰安</a>
						<a href='/area/set?name=聊城&code=371500'>聊城</a>
						<a href='/area/set?name=威海&code=371000'>威海</a>
						<a href='/area/set?name=枣庄&code=370400'>枣庄</a>
						<a href='/area/set?name=德州&code=371400'>德州</a>
						<a href='/area/set?name=日照&code=371100'>日照</a>
						<a href='/area/set?name=东营&code=370500'>东营</a>
						<a href='/area/set?name=滨州&code=371600'>滨州</a>
						<a href='/area/set?name=莱芜&code=371200'>莱芜</a>
						<a href="/area/set?name=章丘&code=370181">章丘</a>
						<a href="/area/set?name=垦利&code=370521">垦利</a>
						<a href="/area/set?name=诸城&code=370782">诸城</a>
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
						<a href='/area/set?name=苏州&code=320500'>苏州</a>
						<a href='/area/set?name=南京&code=320100'>南京</a>
						<a href='/area/set?name=无锡&code=320200'>无锡</a>
						<a href='/area/set?name=常州&code=320400'>常州</a>
						<a href='/area/set?name=徐州&code=320300'>徐州</a>
						<a href='/area/set?name=南通&code=320600'>南通</a>
						<a href='/area/set?name=扬州&code=321000'>扬州</a>
						<a href='/area/set?name=盐城&code=320900'>盐城</a>
						<a href='/area/set?name=淮安&code=320800'>淮安</a>
						<a href='/area/set?name=连云港&code=320700'>连云港</a>
						<a href='/area/set?name=泰州&code=321200'>泰州</a>
						<a href='/area/set?name=宿迁&code=321300'>宿迁</a>
						<a href='/area/set?name=镇江&code=321100'>镇江</a>
						<a href="/area/set?name=沭阳&code=321300">沭阳</a>
						<a href="/area/set?name=大丰&code=320900">大丰</a>
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
						<a href='/area/set?name=杭州&code=330100'>杭州</a>
						<a href='/area/set?name=宁波&code=330200'>宁波</a>
						<a href='/area/set?name=温州&code=330300'>温州</a>
						<a href='/area/set?name=金华&code=330700'>金华</a>
						<a href='/area/set?name=嘉兴&code=330400'>嘉兴</a>
						<a href='/area/set?name=台州&code=331000'>台州</a>
						<a href='/area/set?name=绍兴&code=330600'>绍兴</a>
						<a href='/area/set?name=湖州&code=330500'>湖州</a>
						<a href='/area/set?name=丽水&code=331100'>丽水</a>
						<a href='/area/set?name=衢州&code=330800'>衢州</a>
						<a href='/area/set?name=舟山&code=330900'>舟山</a>
						<a href="/area/set?name=乐清&code=330300">乐清</a>
						<a href="/area/set?name=瑞安&code=330300">瑞安</a>
						<a href="/area/set?name=义乌&code=330700">义乌</a>
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
						<a href='/area/set?name=合肥&code=340100'>合肥</a>
						<a href='/area/set?name=芜湖&code=340200'>芜湖</a>
						<a href='/area/set?name=蚌埠&code=340300'>蚌埠</a>
						<a href='/area/set?name=阜阳&code=341200'>阜阳</a>
						<a href='/area/set?name=淮南&code=340400'>淮南</a>
						<a href='/area/set?name=安庆&code=340800'>安庆</a>
						<a href='/area/set?name=宿州&code=341300'>宿州</a>
						<a href='/area/set?name=六安&code=341500'>六安</a>
						<a href='/area/set?name=淮北&code=340600'>淮北</a>
						<a href='/area/set?name=滁州&code=341100'>滁州</a>
						<a href='/area/set?name=马鞍山&code=340500'>马鞍山</a>
						<a href='/area/set?name=铜陵&code=340700'>铜陵</a>
						<a href='/area/set?name=宣城&code=341800'>宣城</a>
						<a href='/area/set?name=亳州&code=341600'>亳州</a>
						<a href='/area/set?name=黄山&code=341000'>黄山</a>
						<a href='/area/set?name=池州&code=341700'>池州</a>
						<a href='/area/set?name=巢湖&code=341400'>巢湖</a>
						<a href="/area/set?name=霍邱&code=341500">霍邱</a>
						<a href="/area/set?name=桐城&code=340800">桐城</a>
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
						<a href='/area/set?name=深圳&code=440300'>深圳</a>
						<a href='/area/set?name=广州&code=440100'>广州</a>
						<a href='/area/set?name=东莞&code=441900'>东莞</a>
						<a href='/area/set?name=佛山&code=440600'>佛山</a>
						<a href='/area/set?name=中山&code=442000'>中山</a>
						<a href='/area/set?name=珠海&code=440400'>珠海</a>
						<a href='/area/set?name=惠州&code=441300'>惠州</a>
						<a href='/area/set?name=江门&code=440700'>江门</a>
						<a href='/area/set?name=汕头&code=440500'>汕头</a>
						<a href='/area/set?name=湛江&code=440800'>湛江</a>
						<a href='/area/set?name=肇庆&code=441200'>肇庆</a>
						<a href='/area/set?name=茂名&code=440900'>茂名</a>
						<a href='/area/set?name=揭阳&code=445200'>揭阳</a>
						<a href='/area/set?name=梅州&code=441400'>梅州</a>
						<a href='/area/set?name=清远&code=441800'>清远</a>
						<a href='/area/set?name=阳江&code=441700'>阳江</a>
						<a href='/area/set?name=韶关&code=440200'>韶关</a>
						<a href='/area/set?name=河源&code=441600'>河源</a>
						<a href='/area/set?name=云浮&code=445300'>云浮</a>
						<a href='/area/set?name=汕尾&code=441500'>汕尾</a>
						<a href='/area/set?name=潮州&code=445100'>潮州</a>
						<a href="/area/set?name=台山&code=440700">台山</a>
						<a href="/area/set?name=阳春&code=441700">阳春</a>
						<a href="/area/set?name=顺德&code=440600">顺德</a>
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
						<a href='/area/set?name=福州&code=350100'>福州</a>
						<a href='/area/set?name=厦门&code=350200'>厦门</a>
						<a href='/area/set?name=泉州&code=350500'>泉州</a>
						<a href='/area/set?name=莆田&code=350300'>莆田</a>
						<a href='/area/set?name=漳州&code=350600'>漳州</a>
						<a href='/area/set?name=宁德&code=350900'>宁德</a>
						<a href='/area/set?name=三明&code=350400'>三明</a>
						<a href='/area/set?name=南平&code=350700'>南平</a>
						<a href='/area/set?name=龙岩&code=350800'>龙岩</a>
						<a href="/area/set?name=武夷山&code=350700">武夷山</a>
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
						<a href='/area/set?name=武夷山&code=450100'>南宁</a>
						<a href='/area/set?name=武夷山&code=450200'>柳州</a>
						<a href='/area/set?name=武夷山&code=450300'>桂林</a>
						<a href='/area/set?name=武夷山&code=450900'>玉林</a>
						<a href='/area/set?name=武夷山&code=450400'>梧州</a>
						<a href='/area/set?name=武夷山&code=450500'>北海</a>
						<a href='/area/set?name=武夷山&code=450800'>贵港</a>
						<a href='/area/set?name=武夷山&code=450700'>钦州</a>
						<a href='/area/set?name=武夷山&code=451000'>百色</a>
						<a href='/area/set?name=武夷山&code=451200'>河池</a>
						<a href='/area/set?name=武夷山&code=451300'>来宾</a>
						<a href='/area/set?name=武夷山&code=451100'>贺州</a>
						<a href='/area/set?name=防城港&code=450600'>防城港</a>
						<a href='/area/set?name=武夷山&code=451400'>崇左</a>
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
						<a href='/area/set?name=海口&code=460100'>海口</a>
						<a href='/area/set?name=三亚&code=460200'>三亚</a>
						<a href="/area/set?name=五指山&code=469000">五指山</a>
						<a href="/area/set?name=琼海&code=469000">琼海</a>
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
						<a href='/area/set?name=郑州&code=410100'>郑州</a>
						<a href='/area/set?name=洛阳&code=410300'>洛阳</a>
						<a href='/area/set?name=新乡&code=410700'>新乡</a>
						<a href='/area/set?name=南阳&code=411300'>南阳</a>
						<a href='/area/set?name=许昌&code=411000'>许昌</a>
						<a href='/area/set?name=平顶山&code=410400'>平顶山</a>
						<a href='/area/set?name=安阳&code=410500'>安阳</a>
						<a href='/area/set?name=焦作&code=410800'>焦作</a>
						<a href='/area/set?name=商丘&code=411400'>商丘</a>
						<a href='/area/set?name=开封&code=410200'>开封</a>
						<a href='/area/set?name=濮阳&code=410900'>濮阳</a>
						<a href='/area/set?name=周口&code=411600'>周口</a>
						<a href='/area/set?name=信阳&code=411500'>信阳</a>
						<a href='/area/set?name=驻马店&code=411700'>驻马店</a>
						<a href='/area/set?name=漯河&code=411100'>漯河</a>
						<a href='/area/set?name=三门峡&code=411200'>三门峡</a>
						<a href='/area/set?name=鹤壁&code=410600'>鹤壁</a>
						<a href="/area/set?name=济源&code=410800">济源</a>
						<a href="/area/set?name=鄢陵&code=411000">鄢陵</a>
						<a href="/area/set?name=禹州&code=411000">禹州</a>
						<a href="/area/set?name=长葛&code=411000">长葛</a>
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
						<a href='/area/set?name=武汉&code=420100'>武汉</a>
						<a href='/area/set?name=宜昌&code=420500'>宜昌</a>
						<a href="/area/set?name=襄阳&code=420600">襄阳</a>
						<a href='/area/set?name=荆州&code=421000'>荆州</a>
						<a href='/area/set?name=十堰&code=420300'>十堰</a>
						<a href='/area/set?name=黄石&code=420200'>黄石</a>
						<a href='/area/set?name=孝感&code=420900'>孝感</a>
						<a href='/area/set?name=黄冈&code=421100'>黄冈</a>
						<a href="/area/set?name=恩施&code=422800">恩施</a>
						<a href='/area/set?name=荆门&code=420800'>荆门</a>
						<a href='/area/set?name=咸宁&code=421200'>咸宁</a>
						<a href='/area/set?name=鄂州&code=420700'>鄂州</a>
						<a href='/area/set?name=随州&code=421300'>随州</a>
						<a href="/area/set?name=潜江&code=429000">潜江</a>
						<a href="/area/set?name=天门&code=429000">天门</a>
						<a href="/area/set?name=仙桃&code=429000">仙桃</a>
						<a href="/area/set?name=神农架&code=429000">神农架</a>
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
						<a href='/area/set?name=长沙&code=430100'>长沙</a>
						<a href='/area/set?name=株洲&code=430200'>株洲</a>
						<a href='/area/set?name=益阳&code=430900'>益阳</a>
						<a href='/area/set?name=常德&code=430700'>常德</a>
						<a href='/area/set?name=衡阳&code=430400'>衡阳</a>
						<a href='/area/set?name=湘潭&code=430300'>湘潭</a>
						<a href='/area/set?name=岳阳&code=430600'>岳阳</a>
						<a href='/area/set?name=郴州&code=431000'>郴州</a>
						<a href='/area/set?name=邵阳&code=430500'>邵阳</a>
						<a href='/area/set?name=怀化&code=431200'>怀化</a>
						<a href='/area/set?name=永州&code=431100'>永州</a>
						<a href='/area/set?name=娄底&code=431300'>娄底</a>
						<a href="/area/set?name=湘西&code=430000">湘西</a>
						<a href='/area/set?name=张家界&code=430800'>张家界</a>
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
						<a href='/area/set?name=南昌&code=360100'>南昌</a>
						<a href='/area/set?name=赣州&code=360700'>赣州</a>
						<a href='/area/set?name=九江&code=360400'>九江</a>
						<a href='/area/set?name=宜春&code=360900'>宜春</a>
						<a href='/area/set?name=吉安&code=360800'>吉安</a>
						<a href='/area/set?name=上饶&code=361100'>上饶</a>
						<a href='/area/set?name=萍乡&code=360300'>萍乡</a>
						<a href='/area/set?name=抚州&code=361000'>抚州</a>
						<a href='/area/set?name=景德镇&code=360200'>景德镇</a>
						<a href='/area/set?name=新余&code=360500'>新余</a>
						<a href='/area/set?name=鹰潭&code=360600'>鹰潭</a>
						<a href="/area/set?name=永新&code=360800">永新</a>
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
						<a href='/area/set?name=沈阳&code=210100'>沈阳</a>
						<a href='/area/set?name=大连&code=210200'>大连</a>
						<a href='/area/set?name=鞍山&code=210300'>鞍山</a>
						<a href='/area/set?name=锦州&code=210700'>锦州</a>
						<a href='/area/set?name=抚顺&code=210400'>抚顺</a>
						<a href='/area/set?name=营口&code=210800'>营口</a>
						<a href='/area/set?name=盘锦&code=211100'>盘锦</a>
						<a href='/area/set?name=朝阳&code=211300'>朝阳</a>
						<a href='/area/set?name=丹东&code=210600'>丹东</a>
						<a href='/area/set?name=辽阳&code=211000'>辽阳</a>
						<a href='/area/set?name=本溪&code=210500'>本溪</a>
						<a href='/area/set?name=葫芦岛&code=211400'>葫芦岛</a>
						<a href='/area/set?name=铁岭&code=211200'>铁岭</a>
						<a href='/area/set?name=阜新&code=210900'>阜新</a>
						<a href="/area/set?name=庄河&code=210200">庄河</a>
						<a href="/area/set?name=瓦房店&code=210200">瓦房店</a>
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
						<a href='/area/set?name=哈尔滨&code=230100'>哈尔滨</a>
						<a href='/area/set?name=大庆&code=230600'>大庆</a>
						<a href='/area/set?name=齐齐哈尔&code=230200'>齐齐哈尔</a>
						<a href='/area/set?name=牡丹江&code=231000'>牡丹江</a>
						<a href='/area/set?name=绥化&code=231200'>绥化</a>
						<a href='/area/set?name=佳木斯&code=230800'>佳木斯</a>
						<a href='/area/set?name=鸡西&code=230300'>鸡西</a>
						<a href='/area/set?name=双鸭山&code=230500'>双鸭山</a>
						<a href='/area/set?name=鹤岗&code=230400'>鹤岗</a>
						<a href='/area/set?name=黑河&code=231100'>黑河</a>
						<a href='/area/set?name=伊春&code=230700'>伊春</a>
						<a href='/area/set?name=七台河&code=230900'>七台河</a>
						<a href="/area/set?name=大兴安岭&code=230000">大兴安岭</a>
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
						<a href='/area/set?name=长春&code=220100'>长春</a>
						<a href='/area/set?name=吉林&code=220200'>吉林</a>
						<a href='/area/set?name=四平&code=220300'>四平</a>
						<a href="/area/set?name=延边&code=220000">延边</a>
						<a href='/area/set?name=松原&code=220700'>松原</a>
						<a href='/area/set?name=白城&code=220800'>白城</a>
						<a href='/area/set?name=通化&code=220500'>通化</a>
						<a href='/area/set?name=白山&code=220600'>白山</a>
						<a href='/area/set?name=辽源&code=220400'>辽源</a>
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
						<a href='/area/set?name=成都&code=510100'>成都</a>
						<a href='/area/set?name=绵阳&code=510700'>绵阳</a>
						<a href='/area/set?name=德阳&code=510600'>德阳</a>
						<a href='/area/set?name=南充&code=511300'>南充</a>
						<a href='/area/set?name=宜宾&code=511500'>宜宾</a>
						<a href='/area/set?name=自贡&code=510300'>自贡</a>
						<a href='/area/set?name=乐山&code=511100'>乐山</a>
						<a href='/area/set?name=泸州&code=510500'>泸州</a>
						<a href='/area/set?name=达州&code=511700'>达州</a>
						<a href='/area/set?name=内江&code=511000'>内江</a>
						<a href='/area/set?name=遂宁&code=510900'>遂宁</a>
						<a href='/area/set?name=攀枝花&code=510400'>攀枝花</a>
						<a href='/area/set?name=眉山&code=511400'>眉山</a>
						<a href='/area/set?name=广安&code=511600'>广安</a>
						<a href='/area/set?name=资阳&code=512000'>资阳</a>
						<a href="/area/set?name=凉山&code=510000">凉山</a>
						<a href='/area/set?name=广元&code=510800'>广元</a>
						<a href='/area/set?name=雅安&code=511800'>雅安</a>
						<a href='/area/set?name=巴中&code=511900'>巴中</a>
						<a href="/area/set?name=阿坝&code=513200">阿坝</a>
						<a href="/area/set?name=甘孜&code=510000">甘孜</a>
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
						<a href='/area/set?name=昆明&code=530100'>昆明</a>
						<a href='/area/set?name=曲靖&code=530300'>曲靖</a>
						<a href="/area/set?name=大理&code=530000">大理</a>
						<a href="/area/set?name=红河&code=532500">红河</a>
						<a href='/area/set?name=玉溪&code=530400'>玉溪</a>
						<a href='/area/set?name=丽江&code=530700'>丽江</a>
						<a href="/area/set?name=文山&code=532600">文山</a>
						<a href="/area/set?name=楚雄&code=532300">楚雄</a>
						<a href="/area/set?name=西双版纳&code=530000">西双版纳</a>
						<a href='/area/set?name=昭通&code=530600'>昭通</a>
						<a href="/area/set?name=德宏&code=530000">德宏</a>
						<a href="/area/set?name=普洱&code=530800">普洱</a>
						<a href='/area/set?name=保山&code=530500'>保山</a>
						<a href='/area/set?name=临沧&code=530900'>临沧</a>
						<a href="/area/set?name=迪庆&code=530000">迪庆</a>
						<a href="/area/set?name=怒江&code=530000">怒江</a>
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
						<a href='/area/set?name=贵阳&code=520100'>贵阳</a>
						<a href='/area/set?name=遵义&code=520300'>遵义</a>
						<a href="/area/set?name=黔东南&code=520000">黔东南</a>
						<a href="/area/set?name=黔南&code=520000">黔南</a>
						<a href='/area/set?name=六盘水&code=520200'>六盘水</a>
						<a href="/area/set?name=毕节&code=522400">毕节</a>
						<a href="/area/set?name=铜仁&code=520000">铜仁</a>
						<a href='/area/set?name=安顺&code=520400'>安顺</a>
						<a href="/area/set?name=黔西南&code=520000">黔西南</a>
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
						<a href='/area/set?name=拉萨&code=540100'>拉萨</a>
						<a href="/area/set?name=日喀则&code=542300">日喀则</a>
						<a href="/area/set?name=山南&code=540000">山南</a>
						<a href="/area/set?name=林芝&code=540000">林芝</a>
						<a href="/area/set?name=昌都&code=542100">昌都</a>
						<a href="/area/set?name=那曲&code=540000">那曲</a>
						<a href="/area/set?name=阿里&code=540000">阿里</a>
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
						<a href='/area/set?name=石家庄&code=130100'>石家庄</a>
						<a href='/area/set?name=保定&code=130600'>保定</a>
						<a href='/area/set?name=唐山&code=130200'>唐山</a>
						<a href='/area/set?name=廊坊&code=131000'>廊坊</a>
						<a href='/area/set?name=邯郸&code=130400'>邯郸</a>
						<a href='/area/set?name=秦皇岛&code=130300'>秦皇岛</a>
						<a href='/area/set?name=沧州&code=130900'>沧州</a>
						<a href='/area/set?name=邢台&code=130500'>邢台</a>
						<a href='/area/set?name=衡水&code=131100'>衡水</a>
						<a href='/area/set?name=张家口&code=130700'>张家口</a>
						<a href='/area/set?name=承德&code=130800'>承德</a>
						<a href="/area/set?name=定州&code=130600">定州</a>
						<a href="/area/set?name=馆陶&code=130400">馆陶</a>
						<a href="/area/set?name=张北&code=130700">张北</a>
						<a href="/area/set?name=正定&code=130100">正定</a>
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
						<a href='/area/set?name=太原&code=140100'>太原</a>
						<a href='/area/set?name=临汾&code=141000'>临汾</a>
						<a href='/area/set?name=大同&code=140200'>大同</a>
						<a href='/area/set?name=运城&code=140800'>运城</a>
						<a href='/area/set?name=晋中&code=140700'>晋中</a>
						<a href='/area/set?name=长治&code=140400'>长治</a>
						<a href='/area/set?name=晋城&code=140500'>晋城</a>
						<a href='/area/set?name=阳泉&code=140300'>阳泉</a>
						<a href='/area/set?name=吕梁&code=141100'>吕梁</a>
						<a href='/area/set?name=忻州&code=140900'>忻州</a>
						<a href='/area/set?name=朔州&code=140600'>朔州</a>
						<a href="/area/set?name=临猗&code=140800">临猗</a>
						<a href="/area/set?name=清徐&code=140100">清徐</a>
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
						<a href='/area/set?name=呼和浩特&code=150100'>呼和浩特</a>
						<a href='/area/set?name=包头&code=150200'>包头</a>
						<a href='/area/set?name=赤峰&code=150400'>赤峰</a>
						<a href='/area/set?name=鄂尔多斯&code=150600'>鄂尔多斯</a>
						<a href='/area/set?name=通辽&code=150500'>通辽</a>
						<a href='/area/set?name=呼伦贝尔&code=150700'>呼伦贝尔</a>
						<a href="/area/set?name=巴彦淖尔&code=150000">巴彦淖尔市</a>
						<a href='/area/set?name=乌兰察布&code=150900'>乌兰察布</a>
						<a href='/area/set?name=锡林郭勒&code=152500'>锡林郭勒盟</a>
						<a href='/area/set?name=兴安盟&code=152200'>兴安盟</a>
						<a href='/area/set?name=乌海&code=150300'>乌海</a>
						<a href='/area/set?name=阿拉善盟<&code=152900'>阿拉善盟</a>
						<a href="/area/set?name=海拉尔&code=150700">海拉尔</a>
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
						<a href='/area/set?name=西安&code=610100'>西安</a>
						<a href='/area/set?name=咸阳&code=610400'>咸阳</a>
						<a href='/area/set?name=宝鸡&code=610300'>宝鸡</a>
						<a href='/area/set?name=渭南&code=610500'>渭南</a>
						<a href='/area/set?name=汉中&code=610700'>汉中</a>
						<a href='/area/set?name=榆林&code=610800'>榆林</a>
						<a href='/area/set?name=延安&code=610600'>延安</a>
						<a href='/area/set?name=安康&code=610900'>安康</a>
						<a href='/area/set?name=商洛&code=611000'>商洛</a>
						<a href='/area/set?name=铜川&code=610200'>铜川</a>
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
						<a href='/area/set?name=乌鲁木齐&code=650100'>乌鲁木齐</a>
						<a href="/area/set?name=昌吉<&code=652300">昌吉</a>
						<a href="/area/set?name=巴音郭楞&code=650000">巴音郭楞</a>
						<a href="/area/set?name=伊犁&code=650000">伊犁</a>
						<a href="/area/set?name=阿克苏&code=652900">阿克苏</a>
						<a href="/area/set?name=喀什&code=653100">喀什</a>
						<a href="/area/set?name=哈密&code=652200">哈密</a>
						<a href='/area/set?name=克拉玛依&code=650200'>克拉玛依</a>
						<a href="/area/set?name=博尔塔拉&code=650000">博尔塔拉</a>
						<a href="/area/set?name=吐鲁番<&code=652100">吐鲁番</a>
						<a href="/area/set?name=和田&code=653200">和田</a>
						<a href="/area/set?name=石河子&code=659000">石河子</a>
						<a href="/area/set?name=克孜勒苏&code=650000">克孜勒苏</a>
						<a href="/area/set?name=阿拉尔&code=659000">阿拉尔</a>
						<a href="/area/set?name=五家渠&code=659000">五家渠</a>
						<a href="/area/set?name=图木舒克&code=659000">图木舒克</a>
						<a href="/area/set?name=库尔勒&code=652800">库尔勒</a>
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
						<a href='/area/set?name=兰州&code=620100'>兰州</a>
						<a href='/area/set?name=天水&code=620500'>天水</a>
						<a href='/area/set?name=白银&code=620400'>白银</a>
						<a href='/area/set?name=庆阳&code=621000'>庆阳</a>
						<a href='/area/set?name=平凉&code=620800'>平凉</a>
						<a href='/area/set?name=酒泉&code=620900'>酒泉</a>
						<a href='/area/set?name=张掖&code=620700'>张掖</a>
						<a href='/area/set?name=武威&code=620600'>武威</a>
						<a href='/area/set?name=定西&code=621100'>定西</a>
						<a href='/area/set?name=金昌&code=620300'>金昌</a>
						<a href='/area/set?name=陇南&code=621200'>陇南</a>
						<a href="/area/set?name=临夏&code=620000">临夏</a>
						<a href='/area/set?name=嘉峪关<&code=620200'>嘉峪关</a>
						<a href="/area/set?name=甘南&code=230200">甘南</a>
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
						<a href='/area/set?name=银川&code=640100'>银川</a>
						<a href='/area/set?name=吴忠&code=640300'>吴忠</a>
						<a href='/area/set?name=石嘴山&code=640200'>石嘴山</a>
						<a href='/area/set?name=中卫&code=640500'>中卫</a>
						<a href='/area/set?name=固原&code=640400'>固原</a>
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
						<a href='/area/set?name=西宁&code=630100'>西宁</a>
						<a href="/area/set?name=海西&code=630000">海西</a>
						<a href="/area/set?name=海北&code=630000">海北</a>
						<a href="/area/set?name=果洛&code=630000">果洛</a>
						<a href="/area/set?name=海东&code=630000">海东</a>
						<a href="/area/set?name=黄南&code=630000">黄南</a>
						<a href="/area/set?name=玉树&code=632700">玉树</a>
						<a href="/area/set?name=海南&code=630000">海南</a>
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
						<a href="/area/set?name=香港&code=000852">香港</a>
						<a href="/area/set?name=澳门&code=000853">澳门</a>
						<a href="/area/set?name=台湾&code=000886">台湾</a>
						<a href="/area/set?name=钓鱼岛&code=000001">钓鱼岛</a>
						<a href="/area/set?name=其他&code=000000">其他</a>
					</div>
					<div class="more">
						<a href="#">更多>></a>
					</div>
				</div>
			</div>
		</div>
@endsection


<!--
cities = [["110100","北京市"],["130100","石家庄市"],["130200","唐山市"],["130300","秦皇岛市"],["130400","邯郸市"],["130500","邢台市"],["130600","保定市"],["130700","张家口市"],["130800","承德市"],["130900","沧州市"],["131000","廊坊市"],["131100","衡水市"],["140100","太原市"],["140200","大同市"],["140300","阳泉市"],["140400","长治市"],["140500","晋城市"],["140600","朔州市"],["140700","晋中市"],["140800","运城市"],["140900","忻州市"],["141000","临汾市"],["141100","吕梁市"],["150100","呼和浩特市"],["150200","包头市"],["150300","乌海市"],["150400","赤峰市"],["150500","通辽市"],["150600","鄂尔多斯市"],["150700","呼伦贝尔市"],["150800","巴彦淖尔市"],["150900","乌兰察布市"],["152200","兴安盟"],["152500","锡林郭勒盟"],["152900","阿拉善盟"],["210100","沈阳市"],["210200","大连市"],["210300","鞍山市"],["210400","抚顺市"],["210500","本溪市"],["210600","丹东市"],["210700","锦州市"],["210800","营口市"],["210900","阜新市"],["211000","辽阳市"],["211100","盘锦市"],["211200","铁岭市"],["211300","朝阳市"],["211400","葫芦岛市"],["220100","长春市"],["220200","吉林市"],["220300","四平市"],["220400","辽源市"],["220500","通化市"],["220600","白山市"],["220700","松原市"],["220800","白城市"],["222400","延边朝鲜族自治州"],["230100","哈尔滨市"],["230200","齐齐哈尔市"],["230300","鸡西市"],["230400","鹤岗市"],["230500","双鸭山市"],["230600","大庆市"],["230700","伊春市"],["230800","佳木斯市"],["230900","七台河市"],["231000","牡丹江市"],["231100","黑河市"],["231200","绥化市"],["232700","大兴安岭地区"],["310100","市辖区"],["310200","县"],["320100","南京市"],["320200","无锡市"],["320300","徐州市"],["320400","常州市"],["320500","苏州市"],["320600","南通市"],["320700","连云港市"],["320800","淮安市"],["320900","盐城市"],["321000","扬州市"],["321100","镇江市"],["321200","泰州市"],["321300","宿迁市"],["330100","杭州市"],["330200","宁波市"],["330300","温州市"],["330400","嘉兴市"],["330500","湖州市"],["330600","绍兴市"],["330700","金华市"],["330800","衢州市"],["330900","舟山市"],["331000","台州市"],["331100","丽水市"],["340100","合肥市"],["340200","芜湖市"],["340300","蚌埠市"],["340400","淮南市"],["340500","马鞍山市"],["340600","淮北市"],["340700","铜陵市"],["340800","安庆市"],["341000","黄山市"],["341100","滁州市"],["341200","阜阳市"],["341300","宿州市"],["341400","巢湖市"],["341500","六安市"],["341600","亳州市"],["341700","池州市"],["341800","宣城市"],["350100","福州市"],["350200","厦门市"],["350300","莆田市"],["350400","三明市"],["350500","泉州市"],["350600","漳州市"],["350700","南平市"],["350800","龙岩市"],["350900","宁德市"],["360100","南昌市"],["360200","景德镇市"],["360300","萍乡市"],["360400","九江市"],["360500","新余市"],["360600","鹰潭市"],["360700","赣州市"],["360800","吉安市"],["360900","宜春市"],["361000","抚州市"],["361100","上饶市"],["370100","济南市"],["370200","青岛市"],["370300","淄博市"],["370400","枣庄市"],["370500","东营市"],["370600","烟台市"],["370700","潍坊市"],["370800","济宁市"],["370900","泰安市"],["371000","威海市"],["371100","日照市"],["371200","莱芜市"],["371300","临沂市"],["371400","德州市"],["371500","聊城市"],["371600","滨州市"],["371700","荷泽市"],["410100","郑州市"],["410200","开封市"],["410300","洛阳市"],["410400","平顶山市"],["410500","安阳市"],["410600","鹤壁市"],["410700","新乡市"],["410800","焦作市"],["410900","濮阳市"],["411000","许昌市"],["411100","漯河市"],["411200","三门峡市"],["411300","南阳市"],["411400","商丘市"],["411500","信阳市"],["411600","周口市"],["411700","驻马店市"],["420100","武汉市"],["420200","黄石市"],["420300","十堰市"],["420500","宜昌市"],["420600","襄樊市"],["420700","鄂州市"],["420800","荆门市"],["420900","孝感市"],["421000","荆州市"],["421100","黄冈市"],["421200","咸宁市"],["421300","随州市"],["422800","恩施土家族苗族自治州"],["429000","省直辖行政单位"],["430100","长沙市"],["430200","株洲市"],["430300","湘潭市"],["430400","衡阳市"],["430500","邵阳市"],["430600","岳阳市"],["430700","常德市"],["430800","张家界市"],["430900","益阳市"],["431000","郴州市"],["431100","永州市"],["431200","怀化市"],["431300","娄底市"],["433100","湘西土家族苗族自治州"],["440100","广州市"],["440200","韶关市"],["440300","深圳市"],["440400","珠海市"],["440500","汕头市"],["440600","佛山市"],["440700","江门市"],["440800","湛江市"],["440900","茂名市"],["441200","肇庆市"],["441300","惠州市"],["441400","梅州市"],["441500","汕尾市"],["441600","河源市"],["441700","阳江市"],["441800","清远市"],["441900","东莞市"],["442000","中山市"],["445100","潮州市"],["445200","揭阳市"],["445300","云浮市"],["450100","南宁市"],["450200","柳州市"],["450300","桂林市"],["450400","梧州市"],["450500","北海市"],["450600","防城港市"],["450700","钦州市"],["450800","贵港市"],["450900","玉林市"],["451000","百色市"],["451100","贺州市"],["451200","河池市"],["451300","来宾市"],["451400","崇左市"],["460100","海口市"],["460200","三亚市"],["469000","省直辖县级行政单位"],["500100","市辖区"],["500200","县"],["500300","市"],["510100","成都市"],["510300","自贡市"],["510400","攀枝花市"],["510500","泸州市"],["510600","德阳市"],["510700","绵阳市"],["510800","广元市"],["510900","遂宁市"],["511000","内江市"],["511100","乐山市"],["511300","南充市"],["511400","眉山市"],["511500","宜宾市"],["511600","广安市"],["511700","达州市"],["511800","雅安市"],["511900","巴中市"],["512000","资阳市"],["513200","阿坝藏族羌族自治州"],["513300","甘孜藏族自治州"],["513400","凉山彝族自治州"],["520100","贵阳市"],["520200","六盘水市"],["520300","遵义市"],["520400","安顺市"],["522200","铜仁地区"],["522300","黔西南布依族苗族自治州"],["522400","毕节地区"],["522600","黔东南苗族侗族自治州"],["522700","黔南布依族苗族自治州"],["530100","昆明市"],["530300","曲靖市"],["530400","玉溪市"],["530500","保山市"],["530600","昭通市"],["530700","丽江市"],["530800","思茅市"],["530900","临沧市"],["532300","楚雄彝族自治州"],["532500","红河哈尼族彝族自治州"],["532600","文山壮族苗族自治州"],["532800","西双版纳傣族自治州"],["532900","大理白族自治州"],["533100","德宏傣族景颇族自治州"],["533300","怒江傈僳族自治州"],["533400","迪庆藏族自治州"],["540100","拉萨市"],["542100","昌都地区"],["542200","山南地区"],["542300","日喀则地区"],["542400","那曲地区"],["542500","阿里地区"],["542600","林芝地区"],["610100","西安市"],["610200","铜川市"],["610300","宝鸡市"],["610400","咸阳市"],["610500","渭南市"],["610600","延安市"],["610700","汉中市"],["610800","榆林市"],["610900","安康市"],["611000","商洛市"],["620100","兰州市"],["620200","嘉峪关市"],["620300","金昌市"],["620400","白银市"],["620500","天水市"],["620600","武威市"],["620700","张掖市"],["620800","平凉市"],["620900","酒泉市"],["621000","庆阳市"],["621100","定西市"],["621200","陇南市"],["622900","临夏回族自治州"],["623000","甘南藏族自治州"],["630100","西宁市"],["632100","海东地区"],["632200","海北藏族自治州"],["632300","黄南藏族自治州"],["632500","海南藏族自治州"],["632600","果洛藏族自治州"],["632700","玉树藏族自治州"],["632800","海西蒙古族藏族自治州"],["640100","银川市"],["640200","石嘴山市"],["640300","吴忠市"],["640400","固原市"],["640500","中卫市"],["650100","乌鲁木齐市"],["650200","克拉玛依市"],["652100","吐鲁番地区"],["652200","哈密地区"],["652300","昌吉回族自治州"],["652700","博尔塔拉蒙古自治州"],["652800","巴音郭楞蒙古自治州"],["652900","阿克苏地区"],["653000","克孜勒苏柯尔克孜自治州"],["653100","喀什地区"],["653200","和田地区"],["654000","伊犁哈萨克自治州"],["654200","塔城地区"],["654300","阿勒泰地区"],["659000","省直辖行政单位"]]

-->