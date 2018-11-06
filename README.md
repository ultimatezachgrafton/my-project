# my-project
A contact form written in PHP persisting into a SQL database.

A simple contact form to increase my understanding of SQL, server-side PHP, Bootstrap, Symfony and Composer, anti-bot protection and various other skills. 

This application accesses the contact page at the "/" path. 
Once a contact request is submitted, it is being persisted into MySQL table. 
Submitted contact requests can be viewed on a separate page. 
Access new (unread) contact requests at this path - /records/new. 
All contact requests can be accessed at this path - /records. 
One contact request at a time is being displayed. If more than one contact request is available in the current path, pagination links are shown. Individual contact requests are accessible at this path - /record/{uuid}, where {uuid} is the UUID of the record.

Anti-bot protection.
Menu/navigation bar allows seamless switching between displaying new, or all contact requests
Marks contact request as read when displayed (set isRead field to true)
