<?php

namespace App\Exceptions\Elements;

use Exception;

class ElementsNotFoundException extends Exception
{
    public function render($request)
    {
        if ($request->wantsJson()) {
            return response()
                ->json(['message' => $this->getMessage()], $this->code)
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        } else {
            abort(404);
        }
    }
}
