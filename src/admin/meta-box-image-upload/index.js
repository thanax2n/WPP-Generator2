import React, { useState } from 'react'
import { createRoot } from 'react-dom/client'
import ImageUploader from './components/ImageUploader'

// Function to render React components
const renderImageUploaders = () => {

  const uploaderElements = document.querySelectorAll('.mx-image-uploader')

  uploaderElements.forEach((element, index) => {
    
    const root = createRoot(element)
    const postMetaKey = element.getAttribute('data-post-meta-key')
    const postId = element.getAttribute('data-post-id')
    root.render(<ImageUploader postMetaKey={postMetaKey} postId={postId} />)
  })
}

// Call the render function when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', renderImageUploaders)