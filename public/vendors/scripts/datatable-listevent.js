$('document').ready(function () {
	$('.data-table').DataTable({
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		order: [[0, 'desc']],
		paging: false,
		searching: false,
		ordering:  false,
	});
});