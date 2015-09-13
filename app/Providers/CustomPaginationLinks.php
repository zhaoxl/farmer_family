<?php namespace App\Providers;

use Illuminate\Pagination\BootstrapThreePresenter;

class CustomPaginationLinks extends BootstrapThreePresenter {

  public function getPrevious($text = '&laquo;')
  {
      // If the current page is less than or equal to one, it means we can't go any
      // further back in the pages, so we will render a disabled previous button
      // when that is the case. Otherwise, we will give it an active "status".
      if ($this->currentPage <= 1)
      {
          return $this->getDisabledTextWrapper($text);
      }

      $url = $this->paginator->getUrl($this->currentPage - 1);

      return $this->getPageLinkWrapper($url, $text, 'prev');
  }

  public function getNext($text = '&raquo;')
  {
      // If the current page is greater than or equal to the last page, it means we
      // can't go any further into the pages, as we're already on this last page
      // that is available, so we will make it the "next" link style disabled.
      if ($this->currentPage >= $this->lastPage)
      {
          return $this->getDisabledTextWrapper($text);
      }

      $url = $this->paginator->getUrl($this->currentPage + 1);

      return $this->getPageLinkWrapper($url, $text, 'next');
  }
    public function getActivePageWrapper($text)
    {
        return '<li class="active">'.$text.'</li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="disabled"><a href="#">'.$text.'</a></li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
			if ($page == $this->paginator->currentPage())
			{
				return $this->getActivePageWrapper($page);
			}

			return $this->getAvailablePageWrapper($url, $page, $rel);
    }

    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pagination">%s %s %s</ul>',
                $this->getPreviousButton('&nbsp;&nbsp;上一页&nbsp;&nbsp;'),
                $this->getLinks(),
                $this->getNextButton('&nbsp;&nbsp;下一页&nbsp;&nbsp;')
            );
        }

        return '';
    }

}