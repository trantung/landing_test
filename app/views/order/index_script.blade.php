<script type="text/javascript">
$(document).ready(function () {
$('#dtHorizontalExample').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>
<style type="text/css">
	.dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalExample th, td {
white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,

table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}   
.scrollme {
    overflow-y: auto;
} 
</style>
