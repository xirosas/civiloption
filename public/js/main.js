
$('document').ready(function(){
	var path = "{{ route('autocomplete') }}";
	$('input.typeahead.form-control').typeahead({
	    source:  function (query, process) {
	    return $.get(path, { query: query }, function (data) {
	            return process(data);
	        });
	    }
	});
});

function upperCaseF(a){
	    setTimeout(function(){
	        a.value = a.value.toUpperCase();
	    }, 1);
	}
