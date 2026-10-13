
<div>
    <label for="title">Title *</label>
    <input
        id="title"
        type="text"
        name="title"
        value="{{ old('title', isset($task) ? $task->title : '') }}"
        required
        maxlength="255"
    >

    <label for="description">Description</label>
    <textarea
        id="description"
        name="description"
        rows="4"
    >{{ old('description', isset($task) ? $task->description : '') }}</textarea>

    <label for="due_date">Due Date</label>
    <input
        id="due_date"
        type="date"
        name="due_date"
        value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}"
    >

    <label for="status">Status *</label>
    <select id="status" name="status" required>
        <option value="pending"
            @selected(old('status', $task->status ?? 'pending') === 'pending')>
            Pending
        </option>

        <option value="in_progress"
            @selected(old('status', $task->status ?? 'pending') === 'in_progress')>
            In Progress
        </option>

        <option value="completed"
            @selected(old('status', $task->status ?? 'pending') === 'completed')>
            Completed
        </option>
    </select>
</div>
