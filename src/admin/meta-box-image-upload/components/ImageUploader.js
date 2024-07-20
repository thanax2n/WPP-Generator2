import React, { useState } from 'react'
import { makeRequest } from '../features/MakeRequest'

const ImageUploader = ({ postMetaKey, postId }) => {

    const [imageUrl, setImageUrl] = useState('')
    const [imageId, setImageId] = useState('')
    const [error, setError] = useState('')

    let frame = null

    const openFileInput = (e) => {
        e.preventDefault()

        setError('')

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

            const attachment = frame.state().get('selection').first()

            const imageId = attachment.id

            const attributes = {
                imageId,
                postMetaKey
            }

            makeRequest(postId, attributes)
                .then(res => {

                    if (res.status === 200) {

                        setImageId(imageId)

                        const imageUrl = res.data.imageUrl

                        setImageUrl(imageUrl)
                    } else {

                        setError('Failed to upload image. Please try again.')
                    }
                })
                .catch(
                    error => {

                        const message = error?.response?.data?.message ? error.response.data.message : error.message

                        setError('Error: ' + message)
                    }
                )
        })

        frame.open()
    }

    const removeImage = (e) => {
        e.preventDefault()
        setImageUrl('')
        setImageId('')
    }

    return (
        <div className="mx-image-uploader-react">

            {error && (
                <div className="error-message" style={{ color: 'red', marginBottom: '10px' }}>
                    {error}
                </div>
            )}

            <button
                onClick={openFileInput}
                style={{ display: imageUrl ? 'none' : 'block' }}
            >
                Choose Image
            </button>
            {imageUrl && (
                <>
                    <img
                        src={imageUrl}
                        alt="Uploaded"
                        style={{ display: 'block', maxWidth: '100%' }}
                    />
                    <button
                        onClick={removeImage}
                        style={{ display: 'block' }}
                    >
                        Remove Image
                    </button>
                    <input
                        type="hidden"
                        value={imageId}
                        name={`image-id-${imageId}`}
                    />
                </>
            )}
        </div>
    )
}

export default ImageUploader