angular.module("myFirstApp")
.factory( 'eventFactory', function(){

	var eventFactory = {};
	var events = [];

	eventFactory.getAllEvents = function() {
		return events;
	}

	eventFactory.createEvent = function( event, eventList  ) {

		//eventList.push(event);
		//return eventList;

		events.push( event);
		eventList = events;

		return eventList;


	}

	return eventFactory;
})