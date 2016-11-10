
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');

require('./dashboard');
require('./contact');
require('./positions');
require('./search');

// Pages
require('./pages/position/position-dashboard');

// -- Settings
require('./settings/profile/update-notification-details');

// Departments
require('./settings/departments/add-department');
require('./settings/departments/departments');
require('./settings/departments/department-profile');

// Department Profile
require('./settings/departments/profile/update-department-info');
require('./settings/departments/profile/update-department-profile-photo');

// Positions
require('./settings/positions/add-position');
require('./settings/positions/position-profile');

// Position Profile
require('./settings/positions/profile/update-position-info');
require('./settings/positions/profile/update-position-profile-doc1');
require('./settings/positions/profile/update-position-profile-doc2');
require('./settings/positions/profile/update-position-profile-doc3');
require('./settings/positions/profile/update-position-profile-doc4');
require('./settings/positions/profile/update-position-profile-doc5');
require('./settings/positions/profile/update-position-profile-doc6');