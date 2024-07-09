; (function (C) {

	const addButtons = document.querySelectorAll(C)

	if (addButtons.length === 0) return

	addButtons.forEach(function (v, i) {

		openFrame(i)
	})

	// Add image
	function openFrame(i) {

		let frame = null

		addButtons[i].onclick = function (e) {

			const frameButton = this

			const parent = frameButton.closest('div')

			e.preventDefault()

			if (frame) {
				frame.open()
				return
			}

			frame = wp.media.frames.metaBoxUploadImage = wp.media({

				title: 'Choose image',

				library: {
					type: 'image'
				},

				button: {
					text: 'Upload'
				},

				multyple: false
			})

			frame.on('select', function () {

				var attachment = frame.state().get('selection').first()

				// and show the image's data
				var imageId = attachment.id

				var imageUrl = attachment.attributes.url

				parent.querySelector(`${C}--save`).value = imageId

				parent.querySelector(`${C}--show`).setAttribute('src', imageUrl)

				parent.querySelector(`${C}--show`).style.display = 'block'
				parent.querySelector(`${C}--remove`).style.display = 'block'

				parent.querySelector(C).style.display = 'block'

				frameButton.style.display = 'none'

			})

			frame.open()

		}
	}

	const removeButtons = document.querySelectorAll(`${C}--remove`)

	if (removeButtons.length === 0) return

	removeButtons.forEach(function (v, i) {

		removeImage(i)
	})

	// Remove image
	function removeImage(i) {

		removeButtons[i].onclick = function (e) {

			e.preventDefault()

			const button = this

			const parent = button.closest('div')

			parent.querySelector(`${C}--save`).value = ''

			parent.querySelector(`${C}--show`).setAttribute('src', '')

			parent.querySelector(`${C}--remove`).style.display = 'none'

			parent.querySelector(C).style.display = 'block'

		}
	}

})('.mxsfwn_upload_image');