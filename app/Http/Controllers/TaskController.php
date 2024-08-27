<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //

    public function add_task(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:255',
            'status' => 'nullable|min:3|max:255',
            'due_date' => 'nullable|min:3|max:255',
            'estimated_time' => 'nullable|min:3|max:255',
            'priority' => 'nullable|min:3|max:255',
            'tag' => 'nullable|min:3|max:255',
            'project_id' => 'required',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = 'todo';
        $task->due_date = $request->due_date;
        $task->estimated_time = $request->estimated_time;
        $task->priority = $request->priority;
        $task->tag = $request->tag;
        $task->project_id = $request->project_id;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not added');
        }

        $member = [1, 2, 3, 4];

        foreach ($member as $key => $value) {
            $task->users()->attach($value, ['project_id' => $request->project_id]);
        }
        // dd($task);
        $data = Task::where('project_id', $request->project_id)->get();
        // dd($data);

        return redirect()->route('project_detail', ['id' => $request->project_id])->with(['success', 'Task added successfully', 'data' => $data]);
    }

    public function update_priority(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'priority' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->priority = $request->priority;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task updated successfully');
    }

    public function update_due_date(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'due_date' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->due_date = $request->due_date;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task updated successfully');
    }

    public function get_tags(Request $request)
    {
        // dd($request->all());
        $query = $request->input('tag');
        $tags = Tag::where('name', 'like', "%$query%")->get();

        return response()->json(['tags' => $tags]);
    }

    public function update_tags(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id' => 'required',
            'tag' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->tag = $request->tag;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }
        $tag = Tag::firstOrCreate(['name' => $validated['tag']]);

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task updated successfully');
    }

    public function update_estimated_time(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'estimated_time' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->estimated_time = $request->estimated_time;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task updated successfully');
    }

    public function update_task_status(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'status' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->status = $request->status;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return response()->json(['success' => true]);
    }

    public function delete_task($id)
    {
        // dd($id);
        $task = Task::find($id);
        $task->delete();
        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not deleted');
        }

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task deleted successfully');
    }



    public function update_developers(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'task_id' => 'required',
            'project_id' => 'required',
            'developers' => 'required|array',
        ]);

        $task = Task::find($request->task_id);

        // Detach all existing relationships
        $task->users()->detach();
        $member = $request->developers;
        // dd($member);

        foreach ($member as $key => $value) {
            $task->users()->attach($value, ['project_id' => $request->project_id]);
        }
        $task->save();
        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        $task_user = $task->users;
        // dd($task_user);

        return response()->json(['success' => true, 'task_user' => $task_user]);
    }

    public function add_new_tag(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tag' => 'required',
        ]);

        $tag = Tag::firstOrCreate(['name' => $request->tag]);
        if (!$tag) {
            return redirect()->route('projects')->with('error', 'Tag not added');
        }

        return redirect()->back()->with('success', 'Tag added successfully');
    }

    public function update_tag(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'task_id' => 'required',
            'tag' => 'required',
            'project_id' => 'required',
        ]);

        // Retrieve all existing tag names from the tags table
        $existingTags = DB::table('tags')->pluck('name')->toArray();

        $newTags = explode(',', $request->tag);
        $existingTagsLower = array_map('strtolower', $existingTags);
        $newTagsLower = array_map('strtolower', $newTags);
        $uniqueTagsLower = array_diff($newTagsLower, $existingTagsLower);
        $uniqueTags = array_intersect_key($newTags, $uniqueTagsLower);

        foreach ($uniqueTags as $tag) {
            DB::table('tags')->insert(['name' => $tag, 'created_at' => now(), 'updated_at' => now()]);
        }


        $task = Task::find($request->task_id);
        $data = $task->tag;
        $task->tag = $request->tag;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return response()->json(['success' => true, 'task' => $task]);
    }

    public function update_task_tags(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'tags' => 'required',
            'project_id' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->tag = $request->tags;
        $task->save();

        if (!$task) {
            return redirect()->route('projects')->with('error', 'Task not updated');
        }

        return redirect()->route('project_detail', ['id' => $task->project_id])->with('success', 'Task updated successfully');
    }
}
