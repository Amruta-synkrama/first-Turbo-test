$(document).ready(function () {

	$('form.update_hotel_details').validate({
	  rules: {
	    website: {
	      required: true,
	      url: true,
	    },
	    headquarter: {
	      required: true
	    },
	    cover: {
	      required: true
	    },
	  },
	  messages: {
	    website: {
	      required: "Please enter a Website",
	      url: "Please enter a vaild Website"
	    },
	    headquarter: {
	      required: "Please enter a Headquarter"
	    },
	    cover: {
	      required: "Please enter a Description"
	    },
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});


	$('form.update_meters').validate({
	  rules: {
	    total_revenue: {
	      required: true,
	      number: true,
	    },
	    daily_rates: {
	      required: true,
	      number: true,
	    }
	  },
	  messages: {
	    total_revenue: {
	      required: "Please enter a Total Revenue"
	    },
	    daily_rates: {
	      required: "Please enter a Daily Rates"
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});


	$('form.update_contact_details').validate({
	  rules: {
	    contact_name: {
	      required: true
	    },
	    contact_email: {
	      required: true,
	      email: true,
	    },
	    contact_no: {
	      required: true,
	      pattern: "\(([0-9]{3}))\)\s*[0-9]{3}[-]*[0-9]{4}",
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});

	$('form.update_user_details').validate({
	  rules: {
	    name: {
	      required: true
	    },
	    username: {
	      required: true
	    },
	    email: {
	      required: true,
	      email: true,
	    },
	    phone_number: {
	      required: true,
	      pattern: "\(([0-9]{3}))\)\s*[0-9]{3}[-]*[0-9]{4}",
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});

	$('form.update_user_details_password').validate({
	  rules: {
	    password: {
	      required: true
	    },
	    confirm_password: {
	      required: true,
	      equalTo: "#password"
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});


	$('form.register_user').validate({
	  rules: {
	    name: {
	      required: true
	    },
	    password: {
	      required: true
	    },
	    username: {
	      required: true
	    },
	    phone_number: {
	      required: true,
	      pattern: "\(([0-9]{3}))\)\s*[0-9]{3}[-]*[0-9]{4}"
	    },
	    email: {
	      required: true,
	      email:true
	    },
	    entity: {
	      required: true
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});


	$('form.update_hotel_branches').validate({
	  rules: {
	    branch_name: {
	      required: true
	    },
	    state_id: {
	      required: true
	    },
	    location_id: {
	      required: true
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});

	$('form.update_link').validate({
	  rules: {
	    company_id: {
	      required: true
	    },
	    hotel_location_id: {
	      required: true
	    },
	    url: {
	      required: true,
	      url:true
	    },
	    expiration_date: {
	      required: true
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});

	$('form.login').validate({
	  rules: {
	    email: {
	      required: true,
	      email:true
	    },
	    password: {
	      required: true
	    }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	    error.addClass('invalid-feedback');
	    element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	    $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	    $(element).removeClass('is-invalid');
	  }
	});

	

	

});