<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Country</th>
        <th>City</th>
        <th>Is Active</th>
        <th>Gender</th>
        <th>Birth Date</th>
        <th>Salary</th>
        <th>Has Children</th>
        <th>Family Status</th>
        <th>Registration Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['country']) ?></td>
            <td><?= htmlspecialchars($user['city']) ?></td>
            <td><?= $user['is_active'] ? 'Yes' : 'No' ?></td>
            <td><?= htmlspecialchars($user['gender']) ?></td>
            <td><?= htmlspecialchars($user['birth_date']) ?></td>
            <td><?= htmlspecialchars($user['salary']) ?></td>
            <td><?= $user['has_children'] ? 'Yes' : 'No' ?></td>
            <td><?= htmlspecialchars($user['family_status']) ?></td>
            <td><?= htmlspecialchars($user['registration_date']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>