import API from "@reactJs/services/API"

const TaskList = API.injectEndpoints({

    endpoints: builder => ({

        // An example of a query without params (GET)
        getTaskList: builder.query({
            query: () => ({
                url: '/get-task-list',
            }),
        }),

        // An example of a query with params (GET)
        getTaskItem: builder.query({
            query: (params = {}) => ({
                url: '/get-task-item',
                params: {
                    postId: params.postId
                },
            }),
        }),

        // An example of a mutation (POST)
        deleteTaskItem: builder.mutation({
            query: ({ taskId }) => ({
                url: '/delete-task-item',
                method: 'POST',
                body: { taskId }
            })
        }),
    })
});

export default TaskList

export const {
    useGetTaskListQuery,
    useGetTaskItemQuery,
    useDeleteTaskItemMutation
} = TaskList