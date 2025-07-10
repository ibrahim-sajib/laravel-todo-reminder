<p>Hello {{ $todo->user->name }},</p>

<p>This is a reminder for your todo:</p>
<ul>
  <li><strong>Title:</strong> {{ $todo->title }}</li>
  <li><strong>Description:</strong> {{ $todo->description }}</li>
  <li><strong>Remind At:</strong> {{ $todo->remind_at }}</li>
</ul>

<p>Attached is a list of titles from the API.</p>
