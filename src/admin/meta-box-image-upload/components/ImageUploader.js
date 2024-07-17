import React, { useState } from 'react';

const ImageUploader = ({ postMetaKey, postId }) => {

    const [imageUrl, setImageUrl] = useState('');
    const [imageId, setImageId] = useState('');

    let frame = null;

    const openFileInput = (e) => {
        e.preventDefault();

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
        });

        frame.on('select', function () {

            var attachment = frame.state().get('selection').first()

            var imageId = attachment.id

            var imageUrl = attachment.attributes.url;

            console.log('imageId', imageId);

        });

        console.log('postId', postId);

        frame.open()
    };

    const handleFileChange = (e) => {
        // setImageUrl(e.target.result);
        // setImageId(Date.now().toString());
    };

    const removeImage = (e) => {
        e.preventDefault();
        setImageUrl('');
        setImageId('');
    };

    return (
        <div className="mx-image-uploader-react">

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
                        name={`image-id-${elementId}`}
                    />
                </>
            )}
        </div>
    );
};

export default ImageUploader;