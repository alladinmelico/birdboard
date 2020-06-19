const replyClick = element => {
	const parent = element.parentElement
	parent.nextElementSibling.classList.toggle('comment-form')
}

const showReply = element => {
	const children = element.children
	console.log(element.target)
	for (let index = 0; index < children.length; index++) {
		if (children[index].className.includes('comment-forms'))
			children[index].classList.toggle('parent')
	}
	// console.log(element.lastChild.classList.toggle('parent'))
}

const showReplies = () => {
	const commentForms = document.querySelectorAll('.comment-forms')

	commentForms.forEach(comment => {
		comment.addEventListener('click', e => {
			const children = comment.children
			for (let index = 0; index < children.length; index++) {
				if (children[index].className.includes('comment-forms')) {
					children[index].classList.toggle('parent')
				}
			}
		})
	})
}

window.addEventListener('load', function() {
	showReplies()
})
