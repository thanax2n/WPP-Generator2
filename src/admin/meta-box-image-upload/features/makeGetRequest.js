import axios from 'axios'

export const makeGetRequest = async (postId, postMetaKey) => {

    const encodedMetaKey = encodeURIComponent(postMetaKey);

    /**
     * Server callback is here \includes\Features\API\Routes\UpdatePostMetaImageRoute.php
     * */
    return await axios.get('/wp-json/wpp-generator/v1/get-post-meta', {
        params: {
            post_id: postId,
            // encodeURIComponent(searchTerm)
        },
        headers: {
            'X-WP-Nonce': mxsfwnAdminLocalize.nonce
        }
    })
}