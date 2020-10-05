$(function () {
	$('.select2').select2();

	$('[data-mask]').inputmask();

	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});

	$('.dataFrame').attr('id', 'example1');
	$('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
	$('#example1 thead tr:eq(1) th').each( function (i) {
		var title = $(this).text();
		$(this).html( '<input type="text" title="Search '+title+'" placeholder="Search '+title+'" style="width:100px;" />' );
		$( 'input', this ).on( 'keyup change', function () {
			if ( table.column(i).search() !== this.value ) {
				table
				.column(i)
				.search( this.value )
				.draw();
			}
		} );
	} );

	var table = $('#example1').DataTable( {
		orderCellsTop: true,
		fixedHeader: true,
		responsive: true,
		autoWidth: false
	} );

	var today = new Date();
	const tomorrow = new Date(today);
	tomorrow.setDate(tomorrow.getDate() + 1)

	var date = tomorrow.getFullYear()+'-'+(tomorrow.getMonth()+1)+'-'+tomorrow.getDate();


	$('#reservationdate').datetimepicker({
		format: 'L',
		minDate: date
	});

	$('body').on('click','.delete-something-cust', function(e){
		e.preventDefault();
		var Href = $(this).attr('href');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, deactivate it!'
		}).then((result) => {
			if (result.value) {
				window.location.href = Href;
			}
		});
	});

	$('body').on('click','.reject-something-cust', function(e){
		e.preventDefault();
		var Href = $(this).attr('href');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, reject it!'
		}).then((result) => {
			if (result.value) {
				window.location.href = Href;
			}
		});
	});

	$('body').on('click','.activate-something-cust', function(e){
		e.preventDefault();
		var Href = $(this).attr('href');
		Swal.fire({
			title: 'Are you sure?',
			text: "You want to activate this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Activate it!'
		}).then((result) => {
			if (result.value) {
				window.location.href = Href;
			}
		});
	});

	$('body').on('click','.remove-something-cust', function(e){
		e.preventDefault();
		var Href = $(this).attr('href');
		Swal.fire({
			title: 'Are you sure?',
			text: "You want to remove this from meter?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Remove this!'
		}).then((result) => {
			if (result.value) {
				window.location.href = Href;
			}
		});
	});

	$('body').on('click','.add-something-cust', function(e){
		e.preventDefault();
		var Href = $(this).attr('href');
		Swal.fire({
			title: 'Are you sure?',
			text: "You want to add this to meter?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Add this!'
		}).then((result) => {
			if (result.value) {
				window.location.href = Href;
			}
		});
	});

	$("#logoutBtn").click(function(){
		localStorage.clear();
	})
});

$(document).ready(function() {

	$('#password').keyup(function() {
		var password = $('#password').val();
		if (checkStrength(password) == false) {
			$('#sign-up').attr('disabled', true);
		}
	});

	function checkStrength(password) {
		var strength = 0;

		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
			strength += 1;
			$('.low-upper-case').addClass('text-success');
			$('.low-upper-case i').removeClass('fa-times').addClass('fa-check');
			$('#popover-password-top').addClass('hide');


		} else {
			$('.low-upper-case').removeClass('text-success');
			$('.low-upper-case i').addClass('fa-times').removeClass('fa-check');
			$('#popover-password-top').removeClass('hide');
		}


		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
			strength += 1;
			$('.one-number').addClass('text-success');
			$('.one-number i').removeClass('fa-times').addClass('fa-check');
			$('#popover-password-top').addClass('hide');

		} else {
			$('.one-number').removeClass('text-success');
			$('.one-number i').addClass('fa-times').removeClass('fa-check');
			$('#popover-password-top').removeClass('hide');
		}


		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
			strength += 1;
			$('.one-special-char').addClass('text-success');
			$('.one-special-char i').removeClass('fa-times').addClass('fa-check');
			$('#popover-password-top').addClass('hide');

		} else {
			$('.one-special-char').removeClass('text-success');
			$('.one-special-char i').addClass('fa-times').removeClass('fa-check');
			$('#popover-password-top').removeClass('hide');
		}

		if (password.length > 7) {
			strength += 1;
			$('.eight-character').addClass('text-success');
			$('.eight-character i').removeClass('fa-times').addClass('fa-check');
			$('#popover-password-top').addClass('hide');

		} else {
			$('.eight-character').removeClass('text-success');
			$('.eight-character i').addClass('fa-times').removeClass('fa-check');
			$('#popover-password-top').removeClass('hide');
		}

		if (strength < 2) {
			$('#result').removeClass()
			$('#password-strength').addClass('progress-bar-danger');

			$('#result').addClass('text-danger').text('Very Week');
			$('#password-strength').css('width', '10%');
			$('#password-submit').prop('disabled',true);
			$('#password-submit').attr('disabled','disabled');
		} else if (strength == 2) {
			$('#result').addClass('good');
			$('#password-strength').removeClass('progress-bar-danger');
			$('#password-strength').addClass('progress-bar-warning');
			$('#result').addClass('text-warning').text('Week')
			$('#password-strength').css('width', '60%');
			$('#password-submit').prop('disabled',true);
			$('#password-submit').attr('disabled','disabled');
			return 'Week'
		} else if (strength == 4) {
			$('#result').removeClass()
			$('#result').addClass('strong');
			$('#password-strength').removeClass('progress-bar-warning');
			$('#password-strength').addClass('progress-bar-success');
			$('#result').addClass('text-success').text('Strong');
			$('#password-strength').css('width', '100%');
			$('#password-submit').prop('disabled',false);
			$('#password-submit').removeAttr('disabled');

			return 'Strong'
		}

	}
});
