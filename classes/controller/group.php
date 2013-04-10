<?php
namespace Contacts;


class Controller_Group extends \Controller_Template 
{

	public function action_index()
	{
		$data['groups'] = Model_Group::find('all');
		$this->template->title = "Groups";
		$this->template->content = \View::forge('group/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and \Response::redirect('Group');

		if ( ! $data['group'] = Model_Group::find($id))
		{
			\Session::set_flash('error', 'Could not find group #'.$id);
			\Response::redirect('Group');
		}

		$this->template->title = "Group";
		$this->template->content = \View::forge('group/view', $data);

	}

	public function action_create()
	{
		if (\Input::method() == 'POST')
		{
			$val = Model_Group::validate('create');
			
			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'name' => \Input::post('name'),
					'description' => \Input::post('description'),
				));

				if ($group and $group->save())
				{
					\Session::set_flash('success', 'Added group #'.$group->id.'.');

					\Response::redirect('group');
				}

				else
				{
					\Session::set_flash('error', 'Could not save group.');
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Groups";
		$this->template->content = \View::forge('group/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and \Response::redirect('Group');

		if ( ! $group = Model_Group::find($id))
		{
			\Session::set_flash('error', 'Could not find group #'.$id);
			\Response::redirect('Group');
		}

		$val = Model_Group::validate('edit');

		if ($val->run())
		{
			$group->name = \Input::post('name');
			$group->description = \Input::post('description');

			if ($group->save())
			{
				\Session::set_flash('success', 'Updated group #' . $id);

				\Response::redirect('group');
			}

			else
			{
				\Session::set_flash('error', 'Could not update group #' . $id);
			}
		}

		else
		{
			if (\Input::method() == 'POST')
			{
				$group->name = $val->validated('name');
				$group->description = $val->validated('description');

				\Session::set_flash('error', $val->error());
			}

			$this->template->set_global('group', $group, false);
		}

		$this->template->title = "Groups";
		$this->template->content = \View::forge('group/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and \Response::redirect('Group');

		if ($group = Model_Group::find($id))
		{
			$group->delete();

			\Session::set_flash('success', 'Deleted group #'.$id);
		}

		else
		{
			\Session::set_flash('error', 'Could not delete group #'.$id);
		}

		\Response::redirect('group');

	}


}