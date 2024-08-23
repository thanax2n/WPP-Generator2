import axios from 'axios'

export const makePostRequest = async (postId, attributes = {}) => {

    /**
     * Server callback is here \includes\Features\API\Routes\UpdatePostMetaImageRoute.php
     * */
    return await axios.post(`/wp-json/wpp-generator/v1/post-id/${postId}`, {
        attributes,
    }, {
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': mxsfwnAdminLocalize.nonce
        }
    })
}