<h2><b>Simple ticket system with 3 roles: Admin, Agent, User.</b></h2>

<h4><b>Regular users: manage THEIR tickets</b></h4>
After registration/login, user sees the menu item "Main" and "Tickets" with a table of tickets only created by themselves.

They can add a new ticket, but can't edit/delete tickets.

They can click the ticket title in the table to open the page to see more details and comments, also may add a comment there.

<h3><b>Agent: manage THEIR tickets</b></h3>
Similar to regular users, agents see only tickets, and only their tickets, but "their" has different meaning - not that they created the tickets, but are assigned to them (by admin).

They can edit tickets and add comments.

<h3><b>Admin: manage everything</b></h3>
Admins see not only tickets table, but also can view more menu items:
Dashboard with the amount of tickets.
Manage Labels, Categories and Users, in CRUD way
Also, when editing the ticket, admins can assign Agent user to it - other users don't see that field(Actually there is random assigment of agents when User/Agent creates ticket, like it is on some big ticket systems).

<h3><b>Ticket Comments</b></h3>
After clicking on ticket, any user can get to its page, and there should be a form to add a comment, and that page shows the list of comments, like on a typical blogpost page.

I used sqlite. To start you need to install all dependencies for composer.json, configure database, do php artisan migrate and seed some basic information like users, categories, labels and priories with php artisan db:seed
