/*******************************************************************************************************************
 * В этом файле кратко описаны методы Google Maps API
 *
 * ПОДКЛЮЧЕНИЕ СКРИПТОВ
 *
 * КЛАССЫ google.maps
 * google.maps.Animation - свойство: анимация маркера
 * google.maps.Circle - создание объекта круга
 * google.maps.Geocoder - оздание объекта геокода
 * google.maps.InfoWindow - создание объекта информера
 * google.maps.LatLng - создание объекта координат
 * google.maps.Map - создание объекта карты !!!
 * google.maps.MapTypeId - свойство: тип карты
 * google.maps.MapTypeControlStyle - свойство: стиль переключателя типа карты
 * google.maps.Marker - создание объекта маркера
 * google.maps.Polygon - создание объекта полигона
 * google.maps.Polyline - создание объекта полилинии
 * google.maps.ZoomControlStyle - свойство: стиль переключателя масштаба
 *
 * СОБЫТИЯ google.maps
 * google.maps.event.addDomListener - установка оброботчика события DOM
 * google.maps.event.addListener - установка оброботчика события каты
 * google.maps.event.trigger - вызов события
 *
 * МЕТОДЫ КАРТЫ - КЛАСС google.maps.Map
 * map.getBounds - возвращает координаты границ карты
 * map.getCenter - возвращает координаты центра карты
 * map.getDiv - возвращает элемент-контейнер карты
 * map.getZoom - возвращает текущий масштаб
 * map.panTo - перемещение к координате
 * map.panToBounds - перемещение границ карты
 * map.setCenter - установка центра карты
 * map.setHeading - установка поворота карты
 * map.setMapTypeId - устанавливает тип карты
 * map.setOptions - установка настроек
 * map.setTilt - установить наклон
 * map.setZoom - установка масштаба карты
 *
 * МЕТОДЫ МЕТОК - КЛАСС google.maps.Marker
 * marker.getPosition - получение координаты
 * marker.setMap - добавление метки на карту
 * 
 * МЕТОДЫ ИНФОРМЕРА - КЛАСС google.maps.InfoWindow
 * informer.close - закрыть информер
 * informer.open - добавление информера на карту
 * informer.getContent - получить содержимое информера
 * informer.setContent - изменить содержимое информера
 * informer.setOptions - изменить настройки информера
 * informer.setPosition - изменит координаты информера
 *
 * ГЕОКОДЕР - КЛАСС google.maps.Geocoder 
 * myGeocoder.geocode - получение метода по адресу и адреса по месту
 *
 ******************************************************************************************************************/


/* ПОДКЛЮЧЕНИЕ СКРИПТОВ */

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>		// из статьи
<script src="http://maps.googleapis.com/maps/api/js"></script>				// с w3schools.com


/*****************************************************************************************************************/


/* МЕТОДЫ КЛАССА google.maps */

google.maps.Animation.BOUNCE					// анимация маркера: BOUNCE, DROP

var myCircle = new google.maps.Circle(			// создание объекта круга
		center: {lat: 49.98, lng: 36.23},		// координаты центра круга
		map: "map"								// на какую карту поместить
		radius:20000,							// радиус круга в метрах
		strokeColor:"#0000FF",					// цвет линии
		strokeOpacity:0.8,						// прозрачность линии
		strokeWeight:2,							// толщина линии
		fillColor:"#0000FF",					// цвет заливки
		fillOpacity:0.4							// прозрачность заливки
	}
);

myGeocoder = new google.maps.Geocoder();		// создание объекта геокода
myGeocoder.geocode(								// запрос на поиск
	{
		address: "майдан Свободи, 1, Харків",	// если имем место по адресу
		location: {lat: 49.98, lng: 36.23},		// если ищем адрес по месту
		region: "RU"							// регион, опционно
	},
	function(GeocoderResult, GeocoderStatus)	// обработчик ответа
);


var informer = new google.maps.InfoWindow(		// создание объекта информера
	{
		content: "Hello World!",				// содержимое информера
		position: {lat: 49.98, lng: 36.23},		// координаты информера, если нет якоря
	}
);

var place = new google.maps.LatLng(49.98, 36.23);			// создание объекта с координатами

var map = new google.maps.Map(					// создание карты и помещение её в DOM
 	document.getElementById("googleMap"),		// выбор контейнера для карты
 	{
      center: {lat: 48.35, lng: 31.17},			// координаты центра карты
      zoom: 6,									// масштаб
      mapTypeId: "roadmap",						// тип карты: roadmap, satellite, hybrid, terrain
    }
);

google.maps.MapTypeId.ROADMAP;					// тип карты: ROADMAP, SATELLITE, HYBRID, TERRAIN

google.maps.MapTypeControlStyle.DEFAULT;		// стиль переключателя типа карты: 
												// HORIZONTAL_BAR, DROPDOWN_MENU, DEFAULT

var myMarker = new google.maps.Marker(			// создание объекта маркера
	{
		position: {lat: 49.98, lng: 36.23},		// координаты маркера
        map: "map",								// на какую карту поместить
        title: "Ха́рьков"						// подпись маркера
	}
);

var myPolygon = new google.maps.Polygon(		// создание объекта полигона
	{
		path: [stavanger,amsterdam,london,stavanger],			// путь
		map: "map",								// на какую карту поместить
		strokeColor: "#0000FF",					// цвет линии
		strokeOpacity: 0.8,						// прозрачность линии
		strokeWeight: 2,						// толщина линии
		fillColor: "#0000FF",					// цвет заливки
		fillOpacity: 0.4						// прозрачность заливки
	}
);

var myPolyline = new google.maps.Polyline(		// создание объекта полилинии
	{
		path: [stavanger,amsterdam,london],		// путь
		map: "map",								// на какую карту поместить
		strokeColor: "#0000FF",					// цвет линии
		strokeOpacity: 0.8,						// прозрачность линии
		strokeWeight: 2							// толщина линии
	}
);

google.maps.ZoomControlStyle.DEFAULT;			// стиль переключателя масштаба: SMALL, LARGE, DEFAULT


/*****************************************************************************************************************/


/* УСТАНОВКА ОБРАБОТЧИКОВ СОБЫТИЙ */

google.maps.event.addDomListener(window, 'load', initialize);	// установка оброботчика события страницы

google.maps.event.addListener(marker,'click',function() {});	// установка оброботчика события карты

google.maps.event.trigger(marker,'click');						// вызов события


/*****************************************************************************************************************/


/* МЕТОДЫ КАРТЫ - КЛАСС google.maps.Map */

var map = new google.maps.Map(					// создание карты и помещение её в DOM
 	document.getElementById("googleMap"),		// выбор контейнера для карты
 	{
      center: {lat: 48.35, lng: 31.17},			// координаты центра карты
      zoom: 6,									// масштаб
      mapTypeId: "roadmap",						// тип карты: roadmap, satellite, hybrid, terrain
      //
      disableDefaultUI: true,					// убрать элементы управления по умолчанию
      mapTypeControl:true,						// переключатель типа карты
      overviewMapControl:true,					// переключатель обзорной миникарты
      panControl:true,							// переключатель панорамирования
      rotateControl:true						// контроллер поворота карты
      scaleControl:true,						// ползунок масштаба
      streetViewControl:true,					// переключатель "обзор улиц"
      zoomControl:true,							// переключатель масштаба
    }
);

map.getBounds();								// возвращает координаты границ карты

map.getCenter();								// возвращает координаты центра карты

map.getDiv();									// возвращает элемент-контейнер карты

map.getZoom();									// возвращает текущий масштаб

map.panTo(										// перемещение центра карты
	{lat: 49.98, lng: 36.23}
	);

map.panToBounds(								// перемещение границ карты
	{lat: 49.98, lng: 36.23},
	{lat: 49.98, lng: 36.23}		
	);

map.setCenter(									// установка центра карты
	{lat: 49.98, lng: 36.23}
	);

map.setMapTypeId("roadmap");					// установка типа карты

map.setHeading(90);								// установка поворота карты

map.setOptions();								// установка настроек

map.setTilt(0);									// установка наклонf

map.setZoom(9);									// установка масштаба карты


/* СПИСОК СОБЫТИЙ КАРТЫ */
'bounds_changed'								// изменены пределы карты
'center_changed'								// изменен центр карты
'click'											// клик мышкой по карте
'drag'											// карту перемещают
'dragend'										// карта перемещена
'dragstart'										// карту начали перемещать
'heading_changed'								// изменен поворот карты
'maptypeid_changed'								// изменен тип карты
'resize'										// изменены размеры контейнера карты
'tilesloaded'									// карта загружена
'tilt_changed'									// изменен наклон карты
'zoom_changed'									// изменен масштаб карты


/*****************************************************************************************************************/


/* МЕТОДЫ МЕТОК - КЛАСС google.maps.Marker */

var marker = new google.maps.Marker(			// создание объекта маркера
	{
		position: {lat: 49.98, lng: 36.23},		// координаты маркера !!!
        animation: "bounce",					// анимация маркера: bounce, drop
        cursor: "type",							// тип курсора при наведении на мышку
        draggable: false,						// можно ли двигать маркер
        icon: 'pinkball.png',					// иконка 'pinkball.png' вместо маркера
        label: "метка",							// метка рядом с маркером
        map: "map",								// на какую карту поместить маркер
        opacity: 0.9,							// прозрачность
        visible: true,							// видим ли
        title: "Ха́рьков",						// подсказка при наведении
        zIndex: 1								// номер слоя, при наложении
	}
);

marker.getPosition();							// получить координаты метки

marker.setLabel("метка");						// изменить метку

marker.setMap(map);								// добавление метки 'marker' на карту 'map'

marker.setOptions(								// изменить настройки маркера
	{
		position: {lat: 49.98, lng: 36.23},		// координаты маркера !!!
        animation: "bounce",					// анимация маркера: bounce, drop
        cursor: "type",							// тип курсора при наведении на мышку
        draggable: false,						// можно ли двигать маркер
        icon: 'pinkball.png',					// иконка 'pinkball.png' вместо маркера
        label: "метка",							// метка рядом с маркером
        map: "map",								// на какую карту поместить маркер
        opacity: 0.9,							// прозрачность
        visible: true,							// видим ли
        title: "Ха́рьков",						// подсказка при наведении
        zIndex: 1								// номер слоя, при наложении
	}
);

/* СПИСОК СОБЫТИЙ МЕТКИ */
'animation_changed'								// изменена настройка анимации
'click'											// клик мышкой по метке
'dblclick'										// двойной клик мышкой по метке
'drag'											// маркер перемещают
'dragend'										// маркер перемещен
'dragstart'										// маркер начали перемещать	
'icon_changed'									// изменена иконка маркера
'mouseout'										// мышка наведена на метку
'mouseover'										// мышка убрана с метки
'position_changed'								// изменена координаты метки


/*****************************************************************************************************************/


/* МЕТОДЫ ИНФОРМЕРА - КЛАСС google.maps.InfoWindow */

var informer = new google.maps.InfoWindow(		// создание объекта информера
	{
		content: "Hello World!",				// содержимое информера
		maxWidth: 100,							// максимальная ширина информера
		position: {lat: 49.98, lng: 36.23},		// координаты информера, если нет якоря
		pixelOffset: {height: 10, width: 10},	// смещение в пикселах относительно якоря
		zIndex: 1								// номер слоя, при наложении
	}
);

informer.close();								// закрыть информер

informer.open(map,anchor);						// добавление информера 'informer' на карту 'map'
												// якорем 'anchor' может быть маркер, полигон, прочее

informer.getContent();							// получить содержимое информера

informer.setContent("content");					// изменить содержимое информера

informer.setOptions(							// изменить настройки информера
	{
		content: "Hello World!",				// содержимое информера
		maxWidth: 100,							// максимальная ширина информера
		position: {lat: 49.98, lng: 36.23},		// координаты информера, если нет якоря
		pixelOffset: {height: 10, width: 10},	// смещение в пикселах относительно якоря
		zIndex: 1								// номер слоя, при наложении
	}
);

informer.setPosition({lat: 49.98, lng: 36.23});	// изменит координаты информера

/* СПИСОК СОБЫТИЙ ИНФОРМЕРА */
'closeclick'									// закрытие информера
'content_changed'								// изменение содержимого информера
'domready'										// содержимое информера загружено в DOM
'position_changed'								// изменена координаты информера	
'zindex_changed'								// измененен слой информера	


/*****************************************************************************************************************/


/* ГЕОКОДЕР - КЛАСС google.maps.Geocoder */

myGeocoder = new google.maps.Geocoder();		// создание объекта геокода
myGeocoder.geocode(								// запрос на поиск
	{
		address: "майдан Свободи, 1, Харків",	// если имем место по адресу
		location: {lat: 49.98, lng: 36.23},		// если ищем адрес по месту
		region: "UA"							// регион, опционно
	},
	function(GeocoderResult, GeocoderStatus)	// обработчик ответа
);
google.maps.GeocoderStatus();					// возвращает строку со статусом ответа по методу geocode()
												// OK, ERROR, INVALID_REQUEST, ZERO_RESULTS
google.maps.GeocoderResult();					// возвращает массив ответа по методу geocode()
												// {types: [], formatted_address: '', address_components: {}, geometry: {}}

// Пример HTTP запроса, позволяющего получить координаты по адресу
// http://maps.googleapis.com/maps/api/geocode/json?address=Иваново&sensor=false&language=ru

// Пример HTTP запроса, позволяющего получить адрес по координатам
// http://maps.googleapis.com/maps/api/geocode/json?latlng=55.75320193022759,37.61922086773683&sensor=false&language=ru

// Пример ответа на запрос: {status: GeocoderStatus, results: GeocoderResult}
{
	"status": "OK",
	"results": [
		{
			"types": [ "street_address" ],
			"formatted_address": "Красная пл., 3, Москва, Россия, 109012",		// полный адрес 
			"address_components": [												// составляющие адреса 
				{
					"long_name": "3",											// 0-дом
					"short_name": "3",
					"types": [ "street_address" ]
				}, {
					"long_name": "Красная пл.",									// 1-улица
					"short_name": "Красная пл.",
					"types": [ "route" ]   
				}, {
					"long_name": "Тверской",									// 2-квартал
					"short_name": "Тверской",
					"types": [ "sublocality", "political" ]
				}, {
					"long_name": "город Москва",								// 3-город
					"short_name": "город Москва",
					"types": [ "locality", "political" ]
				}, {
					"long_name": "АО Центральный",								// 4-район
					"short_name": "АО Центральный",
					"types": [ "administrative_area_level_2", "political" ]
				}, {
					"long_name": "Москва",										// 5-область
					"short_name": "Москва",
					"types": [ "administrative_area_level_1", "political" ]
				}, {
					"long_name": "Россия",										// 6-страна
					"short_name": "RU",
					"types": [ "country", "political" ] 
				}, {
					"long_name": "109012",										// 7-почтовый индекс
					"short_name": "109012",
					"types": [ "postal_code" ]
				}
			], 
			"geometry": {
				"location": {													// местонахождение
					"lat": 56.9924086,
					"lng": 40.9677888
				},
				"location_type": "APPROXIMATE",
				"viewport": {
					"southwest": {												// размеры, юго-запад
						"lat": 56.9699256,
						"lng": 40.9265167
					},
					"northeast": {												// размеры, северо-восток
						"lat": 57.0148916,
						"lng": 41.0090609
					}
				},
				"bounds": {
					"southwest": {												// границы, юго-запад
						"lat": 56.9699256,
						"lng": 40.9265167
					},
					"northeast": {												// границы, северо-восток
						"lat": 57.0148916,
						"lng": 41.0090609
					}
				}
			} 
		}
	]
}


