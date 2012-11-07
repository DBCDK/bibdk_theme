#Custom theme for bibliotek.dk

Bibdk_theme uses SASS to process css.<br/>
http://compass-style.org/install/

With compass installed run from within the theme folder root

    compass watch


###Forms
Example forms can be found in the bibdk_frontend module<br/>
bibdk_forms/all_element_types<br/>
bibdk_forms/all_inline_element_types

To make it easy to build and alter forms we use default Drupal classes.
The class .form-wrapper is used to create 'form sections' marked by a border-bottom.

By default Drupal adds the .form-wrapper to fieldsets and the container form type
It is however easy to inject the class where needed.

#####Option 1
Simply use #prefix and #suffix.<br/>
Prefix should be added to the first element in the 'form section'.<br/>
Suffix should be added to the last element in the 'form section'.<br/>
... or add both to a single element.

    '#prefix' => '<div class="form-wrapper form-wrapper-horizontal">',
    '#suffix' => '</div>',

#####Option 2
Wrap elements in a container form type.

    $form['container'] = array(
      '#type' => 'container',
    );
    $form['container']['your_form_element'] = array(...);



####Inline form elements
Many form elements can be displayed inline.<br/>
see: bibdk_forms/all_inline_element_types

Inline form elements are created by adding class '.form-wrapper-horizontal' to
the element with the '.form-wrapper'. However, right now it's not possible to create
horizontal form elements on a per field basis.

The '.form-wrapper-horizontal' is added to fieldsets like this:

    #attributes' => array('class => array('form-wrapper-horizontal'))




