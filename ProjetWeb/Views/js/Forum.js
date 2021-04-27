$(function()
{
	$("#form_forum").validate(
		{

		rules: {
			sujet:  {
				required: true,
				minlength: 2
			},
			description: {
				required: true,
				minlength: 5
			},
		},

		messages: {
			sujet: {
				required: "Champ obligatoire",
				minlength: " Le sujet doit contenir au moins 2 caractères",
			},
			description: {
				required: "Champ obligatoire",
				minlength: " La description doit contenir au moins 5 caractères",
			},
		}
	});
});