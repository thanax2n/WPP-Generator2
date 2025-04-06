<?php

namespace MXSFWNWPPGNext\Features\API\Routes\TasksManager;

use MXSFWNWPPGNext\Features\API\AbstractClasses\AbstractRestRouteHandler;
use MXSFWNWPPGNext\Shared\TasksManager;
use WP_REST_Response;

/**
 * REST API route handler for updating the task list.
 * 
 * This class handles POST requests to update the task list in the database.
 * It verifies the nonce, processes the task items, and returns appropriate responses.
 */
class UpdateTaskListRoute extends AbstractRestRouteHandler
{

    protected $route = '/update-task-list';

    public function handleRequest($request): WP_REST_Response
    {

        $nonceCheck = $this->verifyNonce($request);
        if ($nonceCheck !== true) {
            return new WP_REST_Response([
                'message' => esc_html__('Invalid Nonce.', 'wpp-generator-next')
            ], 401);
        }

        $taskItems = $request->get_param('taskItems');

        $updated = TasksManager::updateTaskList($taskItems);

        if ($updated === false) {
            return new WP_REST_Response([
                'message' => esc_html__('Failed to update task list.', 'wpp-generator-next')
            ], 400);
        }

        return new WP_REST_Response([
            'status' => 'success',
            'message' => esc_html__('Task list updated successfully.', 'wpp-generator-next')
        ], 200);
    }
}
