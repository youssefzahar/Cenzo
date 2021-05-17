$(function()
{
	$("#contact-form").validate(
		{

		rules: {
			sujet:  {
				required: true,
				minlength: 2
			},
			description: {
				required: true,
				minlength: 2
			},
		},

		messages: {
			sujet: {
				required: "Champ obligatoire",
				minlength: " La question doit contenir au moins 2 caractères",
			},
			description: {
				required: "Champ obligatoire",
				minlength: " La question doit contenir au moins 2 caractères",
			},
		}
	});
});