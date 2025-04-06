import { __ } from '@wordpress/i18n'
import { useSelector } from "react-redux"
import { useUpdateTaskListMutation } from "@reactJs/services/TaskList"

const SaveTasks = () => {

    const tasks = useSelector((state) => state.taskList.tasks)

    const [updateTaskList, { isLoading: isUpdating }] = useUpdateTaskListMutation()

    const saveTasksToDB = async () => {

        if (!Array.isArray(tasks)) {
            console.log(__('Something went wrong', 'wpp-generator-next'))
            return false
        }

        try {

            await updateTaskList({ taskItems: tasks })
        } catch (error) {

            console.error('Error saving task items:', error)
            return false;
        }
    }

    return (
        <div className="mxsfwn-menu-item mxsfwn-save-tasks-area">
            <button className="mxsfwn-add-to-cart" onClick={saveTasksToDB}>{__('Save Tasks', 'wpp-generator-next')}</button>
        </div>
    )
}

export default SaveTasks
