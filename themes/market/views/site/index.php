<?php  
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', Yii::app()->homeUrl),
    'inactiveLinkTemplate'=>'<noindex><span class="sim-link">{label} <span class="glyphicon glyphicon-chevron-down small"></span></span></noindex>',
));
?>

<!-- <img src="/images/horisont.png" alt=""> -->

<h1>ГДЗ (Готові домашні завдання)</h1>
<div class="description">
	
	<p>
		У даному розділі зібрані розв'язки домашніх завдань для середніх та старших класів (5-11) загальноосвітніх шкіл України. Якщо при рішенні домашнього завдання у Вас виникають труднощі або Ви бажаєте перевірити правильність свого розв'язку, то за допомогою збірників ГДЗ, які тут представлені, Ви зможете легко знайти правильне рішення до завдання, щоб звіритись або знайти правильний шлях для розв'язку.
	</p> 
	<p>
		Готові домашні завдання згруповані у збірники і мають вигляд підручників, до яких містять рішення. Для того щоб знайти рішення до завдання, потрібно вибрати клас, предмет, посібник до необхідного Вам підручника, а далі - відповідний номер завдання. Також можливі випадки, коли рішення об'єднані в сторінки, тому Вам потрібно вибрати сторінку, яка містить номер необхідного завдання. 
	</p>
	
</div>
<div class="separator"></div>

<div class="gdz-table">
	<table>
		<thead>
			<tr>
				<th data-vertical="0"></th>
				<th class="clas-5" data-vertical="1"><a href="/gdz/5" class="clas-5">5 <br><span>клас</span></a></th>
				<th class="clas-6" data-vertical="2"><a href="/gdz/6" class="clas-6">6 <br><span>клас</span></a></th>
				<th class="clas-7" data-vertical="3"><a href="/gdz/7" class="clas-7">7 <br><span>клас</span></a></th>
				<th class="clas-8" data-vertical="4"><a href="/gdz/8" class="clas-8">8 <br><span>клас</span></a></th>
				<th class="clas-9" data-vertical="5"><a href="/gdz/9" class="clas-9">9 <br><span>клас</span></a></th>
				<th class="clas-10" data-vertical="6"><a href="/gdz/10" class="clas-10">10 <br><span>клас</span></a></th>
				<th class="clas-11" data-vertical="7"><a href="/gdz/11" class="clas-11">11 <br><span>клас</span></a></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td data-vertical="0"><a href="/gdz/math">математика</a></td>
				<td data-vertical="1"><a href="/gdz/5/math"><span aria-hidden="true" class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/math"><span aria-hidden="true" class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"></td>
				<td data-vertical="4"></td>
				<td data-vertical="5"></td>
				<td data-vertical="6"></td>
				<td data-vertical="7"></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/lang-ua">українська мова</a></td>
				<td data-vertical="1"><a href="/gdz/5/lang-ua"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/lang-ua"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><a href="/gdz/7/lang-ua"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><a href="/gdz/8/lang-ua"><span class="green glyphicon glyphicon-ok small clas-8"></span></a></td>
				<td data-vertical="5"><a href="/gdz/9/lang-ua"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/lang-ua"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><a href="/gdz/11/lang-ua"><span class="green glyphicon glyphicon-ok small clas-11"></span></a></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/lang-en">англійська мова</a></td>
				<td data-vertical="1"><a href="/gdz/5/lang-en"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><!-- <a href="/gdz/6/lang-en"><span class="green glyphicon glyphicon-ok small clas-6"></span></a> --></td>
				<td data-vertical="3"><!-- <a href="/gdz/7/lang-en"><span class="green glyphicon glyphicon-ok small clas-7"></span></a> --></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/lang-en"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/lang-en"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/lang-en"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/lang-en"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/lang-ru">російська мова</a></td>
				<td data-vertical="1"><a href="/gdz/5/lang-ru"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/lang-ru"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><a href="/gdz/7/lang-ru"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><a href="/gdz/8/lang-ru"><span class="green glyphicon glyphicon-ok small clas-8"></span></a></td>
				<td data-vertical="5"><a href="/gdz/9/lang-ru"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/lang-ru"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/lang-ua"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>
			
			<tr>
				<td data-vertical="0"><a href="/gdz/lit-ua">українська література</a></td>
				<td data-vertical="1"><a href="/gdz/5/lit-ua"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/lit-ua"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><a href="/gdz/7/lit-ua"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/lit-ua"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/lit-ua"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/lit-ua"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/lit-ua"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
				
			</tr>
			
			<tr>
				<td data-vertical="0"><a href="/gdz/lit-w">світова література</a></td>
				<td data-vertical="1"><a href="/gdz/5/lit-w"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><!-- <a href="/gdz/6/lit-ua"><span class="green glyphicon glyphicon-ok small clas-6"></span></a> --></td>
				<td data-vertical="3"><!-- <a href="/gdz/7/lit-ua"><span class="green glyphicon glyphicon-ok small clas-7"></span></a> --></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/lit-ua"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/lit-ua"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/lit-ua"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/lit-ua"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
				
			</tr>
			
			<tr>
				<td data-vertical="0"><a href="/gdz/fizika">фізика</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"></td>
				<td data-vertical="3"><a href="/gdz/7/fizika"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/fizika"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/fizika"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/fizika"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/fizika"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>
			<tr>
				<td data-vertical="0"><a href="/gdz/algebra">алгебра</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"></td>
				<td data-vertical="3"><a href="/gdz/7/algebra"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><a href="/gdz/8/algebra"><span class="green glyphicon glyphicon-ok small clas-8"></span></a></td>
				<td data-vertical="5"><a href="/gdz/9/algebra"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/algebra"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><a href="/gdz/11/algebra"><span class="green glyphicon glyphicon-ok small clas-11"></span></a></td>
			</tr>
			<tr>
				<td data-vertical="0"><a href="/gdz/geom">геометрія</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"></td>
				<td data-vertical="3"><a href="/gdz/7/geom"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/geom"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/geom"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/geom"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><a href="/gdz/11/geom"><span class="green glyphicon glyphicon-ok small clas-11"></span></a></td>
			</tr>
			<tr>
				<td data-vertical="0"><a href="/gdz/him">хімія</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"></td>
				<td data-vertical="3"></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/him"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/him"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/him"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/him"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>
			<tr>
				<td data-vertical="0"><a href="/gdz/bio">біологія</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"></td>
				<td data-vertical="3"><a href="/gdz/7/bio"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/bio"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/bio"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><a href="/gdz/10/bio"><span class="green glyphicon glyphicon-ok small clas-10"></span></a></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/bio"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>
			<tr>
				<td data-vertical="0"><a href="/gdz/geogr">географія</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"><a href="/gdz/6/geogr"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><a href="/gdz/7/geogr"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/geogr"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/geogr"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/geogr"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/geogr"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/info">інформатика</a></td>
				<td data-vertical="1"><a href="/gdz/5/info"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><!-- <a href="/gdz/6/info"><span class="green glyphicon glyphicon-ok small clas-6"></span></a> --></td>
				<td data-vertical="3"><!-- <a href="/gdz/7/info"><span class="green glyphicon glyphicon-ok small clas-7"></span></a> --></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/info"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/info"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/info"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/info"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/health">основи здоров'я</a></td>
				<td data-vertical="1"><a href="/gdz/5/health"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/health"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><a href="/gdz/7/health"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/health"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><a href="/gdz/9/health"><span class="green glyphicon glyphicon-ok small clas-9"></span></a></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/health"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/health"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/etika">етика</a></td>
				<td data-vertical="1"><a href="/gdz/5/etika"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/etika"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><!-- <a href="/gdz/7/etika"><span class="green glyphicon glyphicon-ok small clas-7"></span></a> --></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/etika"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/etika"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/etika"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/etika"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/nature">природознавство</a></td>
				<td data-vertical="1"><a href="/gdz/5/nature"><span class="green glyphicon glyphicon-ok small clas-5"></span></a></td>
				<td data-vertical="2"><a href="/gdz/6/nature"><span class="green glyphicon glyphicon-ok small clas-6"></span></a></td>
				<td data-vertical="3"><!-- <a href="/gdz/7/nature"><span class="green glyphicon glyphicon-ok small clas-7"></span></a> --></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/nature"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/nature"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/nature"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/nature"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

			<tr>
				<td data-vertical="0"><a href="/gdz/history-ua">історія України</a></td>
				<td data-vertical="1"></td>
				<td data-vertical="2"><!-- <a href="/gdz/6/history-ua"><span class="green glyphicon glyphicon-ok small clas-6"></span></a> --></td>
				<td data-vertical="3"><a href="/gdz/7/history-ua"><span class="green glyphicon glyphicon-ok small clas-7"></span></a></td>
				<td data-vertical="4"><!-- <a href="/gdz/8/history-ua"><span class="green glyphicon glyphicon-ok small clas-8"></span></a> --></td>
				<td data-vertical="5"><!-- <a href="/gdz/9/history-ua"><span class="green glyphicon glyphicon-ok small clas-9"></span></a> --></td>
				<td data-vertical="6"><!-- <a href="/gdz/10/history-ua"><span class="green glyphicon glyphicon-ok small clas-10"></span></a> --></td>
				<td data-vertical="7"><!-- <a href="/gdz/11/history-ua"><span class="green glyphicon glyphicon-ok small clas-11"></span></a> --></td>
			</tr>

		</tbody>
	</table>
</div>

<div class="clear"></div>
<div class="separator"></div>

<?php $this->widget('DataBookWidget', array('model'=>$books)); ?>

<div class="clear"></div>
<div class="separator"></div>
<div class="info">Як правильно використовувати готові домашні завдання?</div>
<div class="description">
	<p>
		Зрозуміло, що деякі учні можуть бездумно списувати готові рішення або відповіді в зошит, хоча, ми сподіваємось, що більшість учнів
		так не роблять. А ті хто так робить, то це не гарантує їм (лінивим учням) отримання гарних оцінок і отримання будь-яких знань. 
		<strong>Звертаємо Вашу увагу</strong>, що так можуть робити лише не дуже розумні люди, які можуть такими і залишитися на все життя.
	</p>

	<p>
		Справжня мета даних збірників ГДЗ для середніх та старших класів (5-11) загальноосвітніх шкіл України є в тому, щоби кожен 
		школяр отримав змогу, щонайменше, побачити вірну відповідь для перевірки і, як максимум, побачити правильний 
		розв'язок для того, щоб зрозуміти, як правильно потрібно виконати своє домашнє завдання. А також ГДЗ 
		онлайн дуже зручно використовувати турботливим батькам, які приділяють час для перевірки домашньої роботи у своїх діток.
	</p>
	<p>
		Команда <strong>SHKOLYAR.INFO</strong> намагається перевіряти правильність готових рішень, але ми не несемо відповідальності за отримані оцінки при повному копіюванні готових розв'язків домашніх завдань.
	</p>
</div>
