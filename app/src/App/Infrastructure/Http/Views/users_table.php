<table>
    <thead>
    <tr>
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
    <?php if (isset($users) && is_array($users) && !empty($users)) { ?>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo htmlspecialchars($user['country']); ?></td>
            <td><?php echo htmlspecialchars($user['city']); ?></td>
            <td><?php echo $user['is_active'] ? 'Yes' : 'No'; ?></td>
            <td><?php echo htmlspecialchars($user['gender']); ?></td>
            <td><?php echo htmlspecialchars($user['birth_date']); ?></td>
            <td><?php echo htmlspecialchars($user['salary']); ?></td>
            <td><?php echo $user['has_children'] ? 'Yes' : 'No'; ?></td>
            <td><?php echo htmlspecialchars($user['family_status']); ?></td>
            <td><?php echo htmlspecialchars($user['registration_date']); ?></td>
        </tr>
    <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="9">No users available</td>
        </tr>
    <?php } ?>
    </tbody>
</table>