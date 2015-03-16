# Introduction #
Each project entity may have properties set. If a property is not eplicitely set, it is inherited from the upper-level project in the tree. If the property is still empty, it will be recovered from an upper level and so on until a valid value is defined or the project root is reached.

The code above explains how to retreive an option for a given project with a Propel query.


# Database schema #
```
project:
         treeMode: NestedSet
    id: 
    title:  # required for nested set!
      type: varchar(255)
      required: true
      index: true
    lft: # required for nested set!
      type: integer
      required: true
      nestedSetLeftKey: true
    rgt: # required for nested set!
      type: integer
      required: true
      nestedSetRightKey: true
    is_working_day:
      type: boolean

```

# Propel Query #


We have a $project and we want to know the value of is\_working\_day property. This is the Propel request.

```
class Project extends BaseProject
{
  public function getIsWorkingDay()
  {
     if $iwd= parent::getIsWorkingDay() {
     
       return $iwd;

     }
     else
     {
       $c = new Criteria();
       $c->add(ProjectPeer::IS_WORKING_DAY, false, NOT_EQUAL);
       $c->add(ProjectPeer::LFT, $this->getLft, Criteria::LESS_EQUAL);
       $c->add(ProjectPeer::RGT, $this->getRgt, Criteria::GREATER_EQUAL);
       $c->addDescendingOrderByColumn(CommentPeer::LFT);

       $project_with_property = ProjectPeer::doSelectOne($c);

       return $project_with_property->getIsWorkingDay();

    }
  }
}


```