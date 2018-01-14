function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}



var path = "{{ route('autocomplete') }}";
$('input.typeahead').typeahead({
    source:  function (query, process) {
    return $.get(path, { query: query }, function (data) {
            return process(data);
        });
    }
});